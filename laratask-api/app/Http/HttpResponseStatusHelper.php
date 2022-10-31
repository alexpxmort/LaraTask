<?php
namespace App\Http;


 final class HttpResponseStatusHelper {

    public static  function getStatusCode(string $codeName){
        $STATUS_CODES = [
            'OK' => 200,
            'BAD_REQUEST' => 400,
            'INTERNAL_SERVER_ERROR'=>500,
            'NOT_FOUND'=>404,
            'NO_CONTENT'=>204,
            'CREATED' => 201
        ];

        return $STATUS_CODES[$codeName];
    }
}