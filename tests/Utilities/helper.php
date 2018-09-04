<?php

function create($class, $attributes = [], $howMany = 1)
{
    return factory($class, $howMany)->create($attributes);
}

function make($class, $attributes = [], $howMany = 1)
{
    return factory($class, $howMany)->make($attributes);
}