<?php

function create($class, $attributes = [], $howMany = null)
{
    return factory($class, $howMany)->create($attributes);
}

function make($class, $attributes = [], $howMany = null)
{
    return factory($class, $howMany)->make($attributes);
}