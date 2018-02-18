<?php

namespace MarcRoosendaal\API\Contracts;

use MarcRoosendaal\Support\URL;

interface Request
{
    /**
     * The name of the request.
     *
     * @return string
     */
    public function name();

    /**
     * The slug of the name.
     *
     * @return string
     */
    public function slug();

    /**
     * The URL to request.
     *
     * @return URL|string
     */
    public function url();

    /**
     * The method request type.
     *
     * @return string
     */
    public function method();

    /**
     * Apply validation rules on the request parameters.
     *
     * @return array
     */
    public function rules();

    /**
     * Get the response instance.
     *
     * @return Response
     */
    public function response();

    /**
     * Get the response instance.
     *
     * @return Response
     */
    public function getResponse();

    /**
     * Validate the parameters.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validate();
}