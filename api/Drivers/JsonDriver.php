<?php

namespace MarcRoosendaal\API\Drivers;

use MarcRoosendaal\API\Contracts\Driver;

class JsonDriver implements Driver
{
    /**
     * @inheritdoc
     */
    public function read($contents)
    {
        return json_decode($contents, true);
    }

    /**
     * @inheritdoc
     */
    public function write($contents)
    {
        return json_encode($contents);
    }

    /**
     * @inheritdoc
     */
    public function extension()
    {
        return "json";
    }
}