<?php

namespace MarcRoosendaal\API\Responses;

use MarcRoosendaal\API\Drivers\JsonDriver;
use MarcRoosendaal\API\Contracts\Response;

class AbstractResponse implements Response
{
    /**
     * The request $parameters.
     *
     * @var array
     */
    protected $parameters = [];

    /**
     * The raw response data.
     *
     * @var mixed
     */
    protected $data;

    /**
     * The filtered raw response data.
     *
     * @var array
     */
    protected $contents = [];

    /**
     * The HTTP response status.
     *
     * @var int
     */
    protected $status;

    /**
     * @inheritdoc
     */
    public function backup()
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * @inheritdoc
     */
    public function data()
    {
        return $this->data;
    }

    /**
     * @inheritdoc
     */
    public function contents()
    {
        return $this->contents;
    }

    /**
     * @inheritdoc
     */
    public function get($value)
    {
        return array_get($this->contents, $value);
    }

    /**
     * @inheritdoc
     */
    public function has($value)
    {
        return array_has($this->contents, $value);
    }

    /**
     * @inheritdoc
     */
    public function driver()
    {
        return app(JsonDriver::class);
    }

    /**
     * @inheritdoc
     */
    public function process(array $parameters, $response)
    {
        $this->parameters = $parameters;

        $this->data = $response;

        $this->status = 200;

        $this->build();

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function build()
    {
        $this->contents = $this->data;
    }
}