<?php

namespace MarcRoosendaal\API\Requests;

use MarcRoosendaal\API\Contracts\Request;
use MarcRoosendaal\API\Contracts\Response;
use MarcRoosendaal\API\Responses\BaseResponse;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Validation\Factory;

abstract class AbstractRequest implements Request, Arrayable
{
    /**
     * @inheritdoc
     */
    public function name()
    {
        return "untitled";
    }

    /**
     * @inheritdoc
     */
    public function slug()
    {
        return str_slug($this->name());
    }

    /**
     * @inheritdoc
     */
    public function method()
    {
        return "GET";
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function validate()
    {
        return $this->factory()->make($this->toArray(), $this->rules());
    }

    /**
     * @inheritdoc
     */
    public function response()
    {
        return BaseResponse::class;
    }

    /**
     * Get a Response instance.
     *
     * @return Response
     */
    public function getResponse()
    {
        $instance = app($this->response());

        if ($this->response() && $instance instanceof Response) {
            return $instance;
        }

        return app(BaseResponse::class);
    }

    /**
     * Get a validation factory instance.
     *
     * @return Factory
     */
    protected function factory()
    {
        return app(Factory::class);
    }
}