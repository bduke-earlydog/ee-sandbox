<?php

namespace Avenu\AhUtils\Model;

use ExpressionEngine\Service\Model\Model;

class LandingRegistration extends Model
{
    // Documentation: https://docs.expressionengine.com/latest/development/services/model/building-your-own.html
    // You can get this all instances of this model by using:
    // ee('Model')->get('ah_utils:LandingRegistration')->all();

    protected static $_primary_key = 'id';
    protected static $_table_name = 'avenu_landing_registrations';
    protected $entry_id;
    protected $form_name;
    protected $subject;
    protected $marketing_optin;
    protected $campaign_id;
    protected $record_type_id;
    protected $ah_case_type__c;
    protected $status;
    protected $tactic;
    protected $redirect_url;
    protected $form_url;
    protected $first_name;
    protected $last_name;
    protected $mobile;
    protected $email;
    protected $street;
    protected $city;
    protected $state;
    protected $zipcode;
    protected $birthdate;
    protected $case_record_id;
    protected $date_created;
    protected $user_ip;

    // Add your properties as protected variables here
    protected $id;
}
