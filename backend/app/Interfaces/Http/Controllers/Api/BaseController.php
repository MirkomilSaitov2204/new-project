<?php

namespace Interfaces\Http\Controllers\Api;

use Infrastructure\Core\BaseInterface;
use Interfaces\Http\Controllers\Controller;
use Interfaces\Http\Traits\Response;

class BaseController extends Controller implements BaseInterface
{
    use Response;
}
