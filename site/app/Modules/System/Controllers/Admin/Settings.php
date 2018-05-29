<?php
/**
 * Settings - Implements a simple Administration Settings.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace App\Modules\System\Controllers\Admin;

use App\Core\BackendController;

use Config;
use Input;
use Redirect;
use Validator;
use View;


class Settings extends BackendController
{

    public function __construct()
    {
        parent::__construct();

        //
        $this->beforeFilter('@adminUsersFilter');
    }

    protected function validate(array $data)
    {
        // Validation rules
        $rules = array(
            // The Application.
            'siteName'        => 'required|max:100',
            'siteSkin'        => 'required|alpha_dash',

            // The Mailer
            'pretend'         => 'required',
            'mailDriver'      => 'required|alpha',
            'mailHost'        => 'url',
            'mailPort'        => 'numeric',
            'mailFromAddress' => 'required|email',
            'mailFromName'    => 'required|max:100',
            'mailEncryption'  => 'alpha',
            'mailUsername'    => 'max:100',
            'mailPassword'    => 'max:100',
        );

        $attributes = array(
            // The Application.
            'siteName'        => __d('system', 'Site Name'),
            'siteSkin'        => __d('system', 'Site Skin'),

            // The Mailer
            'pretend'         => __d('system', 'Pretend'),
            'mailDriver'      => __d('system', 'Mail Driver'),
            'mailHost'        => __d('system', 'Server Name'),
            'mailPort'        => __d('system', 'Server Port'),
            'mailFromAddress' => __d('system', 'Mail from Adress'),
            'mailFromName'    => __d('system', 'Mail from Name'),
            'mailEncryption'  => __d('system', 'Encryption'),
            'mailUsername'    => __d('system', 'Server Username'),
            'mailPassword'    => __d('system', 'Server Password'),
        );

        return Validator::make($data, $rules, array(), $attributes);
    }

    public function index()
    {
        // Load the Options from database.
        $options = array(
            // The Application.
            'siteName'        => Input::old('siteName', Config::get('app.name')),
            'siteSkin'        => Input::old('siteSkin', Config::get('app.color_scheme')),

            // The Mailer
            'pretend'         => Input::old('pretend',         Config::get('mail.pretend')),
            'mailDriver'      => Input::old('mailDriver',      Config::get('mail.driver')),
            'mailHost'        => Input::old('mailHost',        Config::get('mail.host')),
            'mailPort'        => Input::old('mailPort',        Config::get('mail.port')),
            'mailFromAddress' => Input::old('mailFromAddress', Config::get('mail.from.address')),
            'mailFromName'    => Input::old('mailFromName',    Config::get('mail.from.name')),
            'mailEncryption'  => Input::old('mailEncryption',  Config::get('mail.encryption')),
            'mailUsername'    => Input::old('mailUsername',    Config::get('mail.username')),
            'mailPassword'    => Input::old('mailPassword',    Config::get('mail.password')),
        );

        return $this->getView()
            ->shares('title', __d('system', 'Settings'))
            ->withOptions($options);
    }

    public function store()
    {
        // Validate the Input data.
        $input = Input::all();

        $validator = $this->validate($input);

        if($validator->passes()) {
            // The Application.
            Config::set('app.name',          $input['siteName']);
            Config::set('app.color_scheme',  $input['siteSkin']);

            // The Mailer
            Config::set('mail.pretend',      $input['pretend']);
            Config::set('mail.driver',       $input['mailDriver']);
            Config::set('mail.host',         $input['mailHost']);
            Config::set('mail.port',         $input['mailPort']);
            Config::set('mail.from.address', $input['mailFromAddress']);
            Config::set('mail.from.name',    $input['mailFromName']);
            Config::set('mail.encryption',   $input['mailEncryption']);
            Config::set('mail.username',     $input['mailUsername']);
            Config::set('mail.password',     $input['mailPassword']);

            // Prepare the flash message.
            $status = __d('system', 'The Settings was successfully updated.');

            return Redirect::to('admin/settings')->withStatus($status);
        }

        // Errors occurred on Validation.
        $status = $validator->errors();

        return Redirect::back()->withInput()->withStatus($status, 'danger');
    }

}
