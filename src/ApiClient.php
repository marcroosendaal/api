<?php

namespace MarcRoosendaal\API;

use MarcRoosendaal\API\Contracts\Request;
use MarcRoosendaal\API\Contracts\Response;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class APIClient
{
    /**
     * Validate the request and call the API.
     *
     * @param  Request              $request
     * @return Response
     * @throws ValidationException
     */
    public function request(Request $request)
    {
        // Validate the request.
        $validator = $request->validate();

        // Return a JSON response if the validation fails.
        if ($validator->fails()) {
            throw new ValidationException($validator, new JsonResponse($validator->errors()->getMessages()));
        }

        // Call the API.
        $contents = $this->call($request);

        // Get the response.
        $response = $request->getResponse();

        // Read the response data.
        $contents = $response->driver()->read($contents);

        // Return the response.
        return $request->getResponse()->process($request->toArray(), $contents);
    }

    /**
     * Call the API.
     *
     * @param  Request          $request
     * @return string
     */
    protected function call(Request $request)
    {
        // Call the API.
        return (new Client)->get((string) $request->url(), ['http_errors' => false])->getBody()->getContents();
    }
}