<?php

namespace Infrastructure\Core;

interface BaseInterface
{
    // items per page
    const PER_PAGE = 20;

    //successfully
    const SUCCESS_CODE = 200;

    // un autharization
    const UNAUTH_CODE = 201;

    // Page not found
    const NOT_FOUND_CODE = 404;

    //Unprocessable Entity
    const UNPROCC_CODE = 422;

    //Server Error
    const SERVER_ERROR = 500;
}
