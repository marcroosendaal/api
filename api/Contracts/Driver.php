<?php

namespace MarcRoosendaal\API\Contracts;

interface Driver
{
    /**
     * Read the contents.
     *
     * @param  mixed        $contents
     * @return mixed
     */
    public function read($contents);

    /**
     * Write the contents.
     *
     * @param  mixed        $contents
     * @return string
     */
    public function write($contents);

    /**
     * The extension used to store backups.
     *
     * @return string
     */
    public function extension();
}