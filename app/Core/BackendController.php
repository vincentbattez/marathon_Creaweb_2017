<?php
/**
 * BackendController - A backend Controller for the included example Modules.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace App\Core;

use Nova\Http\Request;
use Nova\Routing\Route;
use Nova\Support\Facades\Auth;
use Nova\Support\Facades\Redirect;

use App\Core\Controller as BaseController;


abstract class BackendController extends BaseController
{
    /**
     * The currently used Template.
     *
     * @var string
     */
    protected $template = 'AdminLTE';

    /**
     * The currently used Layout.
     *
     * @var mixed
     */
    protected $layout = 'backend';

    /**
     * Create a new BackendController instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * A Before Filter which permit the access to Administrators.
     */
    public function adminUsersFilter(Route $route, Request $request)
    {
        // Check the User Authorization - while using the Extended Auth Driver.
        if (! Auth::user()->hasRole('administrator')) {
            $status = __('You are not authorized to access this resource.');

            return Redirect::to('admin/dashboard')->withStatus($status, 'warning');
        }
    }
}
