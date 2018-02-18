<?php

namespace MarcRoosendaal\API\Contracts;

interface Response
{
    /**
     * Get the Driver instance to read the response.
     *
     * @return Driver
     */
    public function driver();

    /**
     * Determine if the response should be stored raw on the disk.
     *
     * @return bool
     */
    public function backup();

    /**
     * Get the HTTP response status.
     *
     * @return int
     */
    public function status();

    /**
     * Get the raw response data.
     *
     * @return mixed
     */
    public function data();

    /**
     * Get the filtered raw response data.
     *
     * @return array
     */
    public function contents();

    /**
     * Get a value from the filtered raw response data.
     *
     * @param  string       $value
     * @return mixed
     */
    public function get($value);

    /**
     * Determine if a value exists in the filtered raw response data.
     *
     * @param  string       $value
     * @return bool
     */
    public function has($value);

    /**
     * Process the request and response.
     *
     * @param  array        $parameters
     * @param  mixed        $response
     * @return $this
     */
    public function process(array $parameters, $response);

    /**
     * Complete processing the request and response.
     *
     * @return mixed
     */
    public function build();
}