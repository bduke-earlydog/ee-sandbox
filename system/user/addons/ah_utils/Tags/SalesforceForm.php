<?php
namespace Avenu\AhUtils\Tags;

use ExpressionEngine\Service\Addon\Controllers\Tag\AbstractRoute;
class SalesforceForm extends AbstractRoute
{
    public function process()
    {
        $form_data = [
            'hidden_fields' => [
                'proc_salesforce_form' => 'yes',
                'formUrl' => ee()->functions->create_url(ee()->uri->uri_string)
            ],
            'action' => '/scripts/salesforce-process',
        ]; 

        $form_data['class'] = ee()->TMPL->fetch_param('class');
        $form_data['id'] = ee()->TMPL->fetch_param('id');
        $return = ee()->TMPL->fetch_param('return');
        if(!$return) {
            $return = ee()->functions->create_url(ee()->uri->uri_string);
        }

        if( ee()->input->get('id') ) {
            $tactic = filter_var(ee()->input->get('id'), FILTER_SANITIZE_STRING);
            $form_data['hidden_fields']['tactic'] = $tactic;
        }

        if (ee()->input->post('proc_salesforce_form') == 'yes') {
            if (ee('ah_utils:SalesforceService')->processForm()) {
                ee()->load->helper('url');
                redirect($return);
                exit;
            }
        }

        $form = ee('ah_utils:SalesforceService')->prepareFormHtml(ee()->TMPL->tagdata);
        $output = ee()->functions->form_declaration($form_data);
        $output .= $form;

        return $output . '</form>';
    }
}