<?php

namespace App\Traits;

use App\Constants\Env;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Log;

trait ResponseAPI
{
    /**
     * Core of response
     *
     * @param   string          $messages
     * @param   array|object    $data
     * @param   integer         $status_code
     * @param   boolean         $isSuccess
     */
    public function coreResponse($messages, $data = array(), $status_code = 200, $sys_message = null, $isSuccess = true)
    {
        // Check the params
        if (!$messages) {
            return response()->json(['message' => 'Message is required'], 500);
        }

        if (!is_array($messages)) {
            $messages = array($messages);
        }

        if (config('app.env') == Env::PROD) {
            $sys_message = null;
        }

        if ($data == null) {
            $data = array();
        }

        // create struct Response
        $data_header = [
            'status' => 'OK',
            'message' => implode(",", $messages),
            'time_stamp' => now()->format('c'),
            'trace_code' =>  Uuid::uuid4()->toString(),
        ];
        $response = [
            'data_header' => $data_header,
            'data_body' => $data
        ];

        // Send the response
        if ($isSuccess) {
            return response()->json($response, $status_code);
        } else {
            // Log the error
            if ($status_code >= 500) {
                Log::error($sys_message);
            } elseif ($status_code >= 300) {
                Log::warning($sys_message);
            } else {
                Log::notice($sys_message);
            }

            $response['data_header']['status'] = 'FAILED';
            $response['data_header']['sys_messages'] = $sys_message;
            return response()->json($response, $status_code);
        }
    }

    /**
     * Send any success response
     *
     * @param   string|array          $message
     * @param   array|object    $data
     * @param   integer         $status_code
     */
    public function success($messages, $data, $status_code = 200)
    {
        return $this->coreResponse($messages, $data, $status_code);
    }

    /**
     * Send any error response
     *
     * @param   string|array          $message
     * @param   integer         $status_code
     */
    public function error($messages, $sys_message, $status_code = 500)
    {
        return $this->coreResponse($messages, null, $status_code, $sys_message, false);
    }
}
