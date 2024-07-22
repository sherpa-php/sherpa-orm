<?php

namespace Sherpa\Orm;

enum QueryAction
{
    case SELECT;
    case UPDATE;
    case INSERT;
    case DELETE;
}