<?php

/**
 * The function of returning a satisfactory response to the request
 *
 * @param array $data
 * Additional data for the response
 * @param integer $code
 * Response code
 *
 * @return \Illuminate\Http\Response
 */

function getSuccess($data = [], $code = 200)
{
    $content = ['status' => 'SUCCESS'];
    if (count($data) != 0) $content = array_merge($content, $data);
    return response()->json($content, $code);
}

/**
 * The function of returning an unsatisfactory response to a request
 *
 * @param array $message
 * Returned message
 * @param integer $code
 * Response code
 *
 * @return \Illuminate\Http\Response
 */

function getError($message, $code = 400)
{
    return response()->json([
        'status' => 'ERROR',
        'message' => $message
    ], $code, []);
}
