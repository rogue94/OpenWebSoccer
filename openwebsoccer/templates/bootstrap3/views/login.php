{% import "macros/formelements.twig" as formelements %}

{% extends "base.twig" %}

{% block page_title %}
{{ i18n.getMessage("login_title") }}
{% endblock %}

{% block page_content %}
<form class="form-horizontal" method="post">


	{%  if env.getConfig("login_type") == "email" %}
    {{ formelements.textfield('loginstr', i18n.getMessage('entity_users_email'), env.getRequestParameter('loginstr'), true, validationMsg, 'email') }}
 	{% else %}
 	{{ formelements.textfield('loginstr', i18n.getMessage('entity_users_nick'), env.getRequestParameter('loginstr'), true, validationMsg) }}
 	{% endif %}

	{{ formelements.textfield('loginpassword', i18n.getMessage('entity_users_passwort'), '', true, validationMsg, 'password') }}
	
	{{ formelements.checkbox('rememberme', i18n.getMessage('formlogin_option_rememberme'), env.getRequestParameter('rememberme')) }}
	
	{{ formelements.submitButton(i18n.getMessage('formlogin_submit_button')) }}
	
	<input type="hidden" name="page" value="login"/>
	<input type="hidden" name="action" value="login"/>
</form>

{% if env.getConfig("allow_userregistration") %}
	<p><i class="icon-arrow-right"></i> <a href="{{ env.getInternalUrl("register") }}">{{ i18n.getMessage('formlogin_link_register') }}</a></p>
{% endif %}

{% if env.getConfig("login_allow_sendingpassword") %}
	<p><i class="icon-arrow-right"></i> <a href="{{ env.getInternalUrl("forgot-password") }}">{{ i18n.getMessage('formlogin_link_forgot_password') }}</a></p>
{% endif %}
{% endblock %}
