<?php

// If you choose to use ENV vars to define these values, give this IdP its own env var names
// so you can define different values for each IdP, all starting with 'SAML2_'.$this_idp_env_id
$this_idp_env_id = 'TEST';

//This is variable is for simplesaml example only.
// For real IdP, you must set the url values in the 'idp' config to conform to the IdP's real urls.
//$idp_host = env('SAML2_'.$this_idp_env_id.'_IDP_HOST', 'http://localhost:8000/simplesaml');

$idp_host = env('AAI_LOGIN_HOST','');


return $settings = array(

    /*****
     * One Login Settings
     */

    // If 'strict' is True, then the PHP Toolkit will reject unsigned
    // or unencrypted messages if it expects them signed or encrypted
    // Also will reject the messages if not strictly follow the SAML
    // standard: Destination, NameId, Conditions ... are validated too.
    'strict' => true, //@todo: make this depend on laravel config

    // Enable debug mode (to print errors)
    'debug' => env('APP_DEBUG', false),

    // Service Provider Data that we are deploying
    'sp' => array(

        // Specifies constraints on the name identifier to be used to
        // represent the requested subject.
        // Take a look on lib/Saml2/Constants.php to see the NameIdFormat supported
        'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:persistent',

        // Usually x509cert and privateKey of the SP are provided by files placed at
        // the certs folder. But we can also provide them with the following parameters
        'x509cert' => env('SAML2_'.$this_idp_env_id.'_SP_x509',''),
        'privateKey' => env('SAML2_'.$this_idp_env_id.'_SP_PRIVATEKEY',''),

        // Identifier (URI) of the SP entity.
        // Leave blank to use the '{idpName}_metadata' route, e.g. 'test_metadata'.
        'entityId' => env('SAML2_'.$this_idp_env_id.'_SP_ENTITYID',''),

        // Specifies info about where and how the <AuthnResponse> message MUST be
        // returned to the requester, in this case our SP.
        'assertionConsumerService' => array(
            // URL Location where the <Response> from the IdP will be returned,
            // using HTTP-POST binding.
            // Leave blank to use the '{idpName}_acs' route, e.g. 'test_acs'
            'url' => '',
        ),
        // Specifies info about where and how the <Logout Response> message MUST be
        // returned to the requester, in this case our SP.
        // Remove this part to not include any URL Location in the metadata.
        'singleLogoutService' => array(
            // URL Location where the <Response> from the IdP will be returned,
            // using HTTP-Redirect binding.
            // Leave blank to use the '{idpName}_sls' route, e.g. 'test_sls'
            'url' => '',
        ),
    ),

    // Identity Provider Data that we want connect with our SP
    'idp' => array(
        // Identifier of the IdP entity  (must be a URI)
        'entityId' => $idp_host . '/saml2/idp/metadata.php',
        // SSO endpoint info of the IdP. (Authentication Request protocol)
        'singleSignOnService' => array(
            // URL Target of the IdP where the SP will send the Authentication Request Message,
            // using HTTP-Redirect binding.
            'url' => $idp_host . '/saml2/idp/SSOService.php',
        ),
        // SLO endpoint info of the IdP.
        'singleLogoutService' => array(
            // URL Location of the IdP where the SP will send the SLO Request,
            // using HTTP-Redirect binding.
            'url' => $idp_host . '/saml2/idp/SingleLogoutService.php',
        ),
        // Public x509 certificate of the IdP
//        'x509cert' => env('SAML2_'.$this_idp_env_id.'_IDP_x509', 'MIID/TCCAuWgAwIBAgIJAI4R3WyjjmB1MA0GCSqGSIb3DQEBCwUAMIGUMQswCQYDVQQGEwJBUjEVMBMGA1UECAwMQnVlbm9zIEFpcmVzMRUwEwYDVQQHDAxCdWVub3MgQWlyZXMxDDAKBgNVBAoMA1NJVTERMA8GA1UECwwIU2lzdGVtYXMxFDASBgNVBAMMC09yZy5TaXUuQ29tMSAwHgYJKoZIhvcNAQkBFhFhZG1pbmlAc2l1LmVkdS5hcjAeFw0xNDEyMDExNDM2MjVaFw0yNDExMzAxNDM2MjVaMIGUMQswCQYDVQQGEwJBUjEVMBMGA1UECAwMQnVlbm9zIEFpcmVzMRUwEwYDVQQHDAxCdWVub3MgQWlyZXMxDDAKBgNVBAoMA1NJVTERMA8GA1UECwwIU2lzdGVtYXMxFDASBgNVBAMMC09yZy5TaXUuQ29tMSAwHgYJKoZIhvcNAQkBFhFhZG1pbmlAc2l1LmVkdS5hcjCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBAMbzW/EpEv+qqZzfT1Buwjg9nnNNVrxkCfuR9fQiQw2tSouS5X37W5h7RmchRt54wsm046PDKtbSz1NpZT2GkmHN37yALW2lY7MyVUC7itv9vDAUsFr0EfKIdCKgxCKjrzkZ5ImbNvjxf7eA77PPGJnQ/UwXY7W+cvLkirp0K5uWpDk+nac5W0JXOCFR1BpPUJRbz2jFIEHyChRt7nsJZH6ejzNqK9lABEC76htNy1Ll/D3tUoPaqo8VlKW3N3MZE0DB9O7g65DmZIIlFqkaMH3ALd8adodJtOvqfDU/A6SxuwMfwDYPjoucykGDu1etRZ7dF2gd+W+1Pn7yizPT1q8CAwEAAaNQME4wHQYDVR0OBBYEFPsn8tUHN8XXf23ig5Qro3beP8BuMB8GA1UdIwQYMBaAFPsn8tUHN8XXf23ig5Qro3beP8BuMAwGA1UdEwQFMAMBAf8wDQYJKoZIhvcNAQELBQADggEBAGu60odWFiK+DkQekozGnlpNBQz5lQ/bwmOWdktnQj6HYXu43e7sh9oZWArLYHEOyMUekKQAxOK51vbTHzzw66BZU91/nqvaOBfkJyZKGfluHbD0/hfOl/D5kONqI9kyTu4wkLQcYGyuIi75CJs15uA03FSuULQdY/Liv+czS/XYDyvtSLnu43VuAQWN321PQNhuGueIaLJANb2C5qq5ilTBUw6PxY9Z+vtMjAjTJGKEkE/tQs7CvzLPKXX3KTD9lIILmX5yUC3dLgjVKi1KGDqNApYGOMtjr5eoxPQrqDBmyx3flcy0dQTdLXud3UjWVW3N0PYgJtw5yBsS74QTGD4='),
        'x509cert' => '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',

        /*
         *  Instead of use the whole x509cert you can use a fingerprint
         *  (openssl x509 -noout -fingerprint -in "idp.crt" to generate it)
         */
        // 'certFingerprint' => '',
    ),



    /***
     *
     *  OneLogin advanced settings
     *
     *
     */
    // Security settings
    'security' => array(

        /** signatures and encryptions offered */

        // Indicates that the nameID of the <samlp:logoutRequest> sent by this SP
        // will be encrypted.
        'nameIdEncrypted' => false,

        // Indicates whether the <samlp:AuthnRequest> messages sent by this SP
        // will be signed.              [The Metadata of the SP will offer this info]
        'authnRequestsSigned' => false,

        // Indicates whether the <samlp:logoutRequest> messages sent by this SP
        // will be signed.
        'logoutRequestSigned' => false,

        // Indicates whether the <samlp:logoutResponse> messages sent by this SP
        // will be signed.
        'logoutResponseSigned' => false,

        /* Sign the Metadata
         False || True (use sp certs) || array (
                                                    keyFileName => 'metadata.key',
                                                    certFileName => 'metadata.crt'
                                                )
        */
        'signMetadata' => false,


        /** signatures and encryptions required **/

        // Indicates a requirement for the <samlp:Response>, <samlp:LogoutRequest> and
        // <samlp:LogoutResponse> elements received by this SP to be signed.
        'wantMessagesSigned' => false,

        // Indicates a requirement for the <saml:Assertion> elements received by
        // this SP to be signed.        [The Metadata of the SP will offer this info]
        'wantAssertionsSigned' => false,

        // Indicates a requirement for the NameID received by
        // this SP to be encrypted.
        'wantNameIdEncrypted' => false,

        // Authentication context.
        // Set to false and no AuthContext will be sent in the AuthNRequest,
        // Set true or don't present thi parameter and you will get an AuthContext 'exact' 'urn:oasis:names:tc:SAML:2.0:ac:classes:PasswordProtectedTransport'
        // Set an array with the possible auth context values: array ('urn:oasis:names:tc:SAML:2.0:ac:classes:Password', 'urn:oasis:names:tc:SAML:2.0:ac:classes:X509'),
        'requestedAuthnContext' => true,
    ),

    // Contact information template, it is recommended to suply a technical and support contacts
    'contactPerson' => array(
        'technical' => array(
            'givenName' => 'name',
            'emailAddress' => 'no@reply.com'
        ),
        'support' => array(
            'givenName' => 'Support',
            'emailAddress' => 'no@reply.com'
        ),
    ),

    // Organization information template, the info in en_US lang is recomended, add more if required
    'organization' => array(
        'en-US' => array(
            'name' => 'Name',
            'displayname' => 'Display Name',
            'url' => 'http://url'
        ),
    ),

/* Interoperable SAML 2.0 Web Browser SSO Profile [saml2int]   http://saml2int.org/profile/current

   'authnRequestsSigned' => false,    // SP SHOULD NOT sign the <samlp:AuthnRequest>,
                                      // MUST NOT assume that the IdP validates the sign
   'wantAssertionsSigned' => true,
   'wantAssertionsEncrypted' => true, // MUST be enabled if SSL/HTTPs is disabled
   'wantNameIdEncrypted' => false,
*/

);
