<?php header('Content-type: text/xml'); ?>
<?php 	echo  '<?xml version="1.0" encoding="utf-8"?>
<Settings xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
	<Common>
		<SiteName>TARATA LODGE Y MIRADOR SIERRA TACNA</SiteName>
		<LicenseKey />
		<AdminLogin>mailadm</AdminLogin>
		<AdminPassword>$2y$07$90ebec2138c7fa3318697uvBzjH7DbYNq50SzzCGLSFes4KNVp87K</AdminPassword>
		<DBType>MySQL</DBType>
		<DBPrefix>mail</DBPrefix>
		<DBHost>localhost:3307</DBHost>
		<DBName>db_tarata_hotel</DBName>
		<DBLogin>root</DBLogin>
		<DBPassword>123456</DBPassword>
		<UseSlaveConnection>Off</UseSlaveConnection>
		<DBSlaveHost>127.0.0.1</DBSlaveHost>
		<DBSlaveName />
		<DBSlaveLogin>root</DBSlaveLogin>
		<DBSlavePassword />
		<DefaultLanguage>Spanish</DefaultLanguage>
		<DefaultTimeZone>14</DefaultTimeZone>
		<DefaultTimeFormat>F12</DefaultTimeFormat>
		<DefaultDateFormat>DD/MM/YYYY</DefaultDateFormat>
		<AllowRegistration>Off</AllowRegistration>
		<RegistrationDomains />
		<RegistrationQuestions />
		<AllowPasswordReset>Off</AllowPasswordReset>
		<EnableLogging>Off</EnableLogging>
		<EnableEventLogging>Off</EnableEventLogging>
		<LoggingLevel>Full</LoggingLevel>
		<EnableMobileSync>Off</EnableMobileSync>
		<TenantGlobalCapa />
		<LoginStyleImage />
		<AppStyleImage />
		<InvitationEmail />
		<DefaultTab>mailbox</DefaultTab>
		<RedirectToHttps>Off</RedirectToHttps>
		<PasswordMinLength>0</PasswordMinLength>
		<PasswordMustBeComplex>Off</PasswordMustBeComplex>
	</Common>
	<WebMail>
		<AllowWebMail>On</AllowWebMail>
		<IncomingMailProtocol>IMAP4</IncomingMailProtocol>
		<IncomingMailServer>mail.sitelsur.com</IncomingMailServer>
		<IncomingMailPort>143</IncomingMailPort>
		<IncomingMailUseSSL>Off</IncomingMailUseSSL>
		<OutgoingMailServer>mail.sitelsur.com</OutgoingMailServer>
		<OutgoingMailPort>25</OutgoingMailPort>
		<OutgoingMailAuth>AuthCurrentUser</OutgoingMailAuth>
		<OutgoingMailLogin />
		<OutgoingMailPassword />
		<OutgoingMailUseSSL>Off</OutgoingMailUseSSL>
		<OutgoingSendingMethod>Specified</OutgoingSendingMethod>
		<UserQuota>0</UserQuota>
		<ShowQuotaBar>On</ShowQuotaBar>
		<AutoCheckMailInterval>1</AutoCheckMailInterval>
		<DefaultSkin>Default</DefaultSkin>
		<MailsPerPage>20</MailsPerPage>
		<AllowUsersChangeInterfaceSettings>On</AllowUsersChangeInterfaceSettings>
		<AllowUsersChangeEmailSettings>Off</AllowUsersChangeEmailSettings>
		<EnableAttachmentSizeLimit>Off</EnableAttachmentSizeLimit>
		<AttachmentSizeLimit>102400000</AttachmentSizeLimit>
		<ImageUploadSizeLimit>10240000</ImageUploadSizeLimit>
		<AllowLanguageOnLogin>On</AllowLanguageOnLogin>
		<FlagsLangSelect>Off</FlagsLangSelect>
		<LoginFormType>Email</LoginFormType>
		<LoginSignMeType>DefaultOn</LoginSignMeType>
		<LoginAtDomainValue />
		<UseLoginWithoutDomain>Off</UseLoginWithoutDomain>
		<AllowNewUsersRegister>On</AllowNewUsersRegister>
		<AllowUsersAddNewAccounts>Off</AllowUsersAddNewAccounts>
		<AllowOpenPGP>Off</AllowOpenPGP>
		<AllowIdentities>On</AllowIdentities>
		<AllowInsertImage>On</AllowInsertImage>
		<AllowBodySize>Off</AllowBodySize>
		<MaxBodySize>600</MaxBodySize>
		<MaxSubjectSize>255</MaxSubjectSize>
		<Layout>Side</Layout>
		<AlwaysShowImagesInMessage>Off</AlwaysShowImagesInMessage>
		<SaveMail>Always</SaveMail>
		<IdleSessionTimeout>0</IdleSessionTimeout>
		<UseSortImapForDateMode>On</UseSortImapForDateMode>
		<UseThreadsIfSupported>On</UseThreadsIfSupported>
		<DetectSpecialFoldersWithXList>On</DetectSpecialFoldersWithXList>
		<EnableLastLoginNotification>Off</EnableLastLoginNotification>
		<ExternalHostNameOfLocalImap />
		<ExternalHostNameOfLocalSmtp />
		<ExternalHostNameOfDAVServer />
	</WebMail>
	<Calendar>
		<AllowCalendar>Off</AllowCalendar>
		<ShowWeekEnds>Off</ShowWeekEnds>
		<WorkdayStarts>9</WorkdayStarts>
		<WorkdayEnds>18</WorkdayEnds>
		<ShowWorkDay>On</ShowWorkDay>
		<WeekStartsOn>Monday</WeekStartsOn>
		<DefaultTab>Month</DefaultTab>
		<AllowReminders>On</AllowReminders>
	</Calendar>
	<Contacts>
		<AllowContacts>On</AllowContacts>
		<ContactsPerPage>20</ContactsPerPage>
		<ShowGlobalContactsInAddressBook>Off</ShowGlobalContactsInAddressBook>
		<GlobalAddressBookVisibility>Off</GlobalAddressBookVisibility>
	</Contacts>
	<Files>
		<AllowFiles>Off</AllowFiles>
		<EnableSizeLimit>Off</EnableSizeLimit>
		<SizeLimit>0</SizeLimit>
	</Files>
	<Sip>
		<AllowSip>Off</AllowSip>
		<Realm />
		<WebsocketProxyUrl />
		<OutboundProxyUrl />
		<CallerID />
	</Sip>
	<Twilio>
		<AllowTwilio>Off</AllowTwilio>
		<PhoneNumber />
		<AccountSID />
		<AuthToken />
		<AppSID />
	</Twilio>
	<Socials>
		<Google>
			<Allow>Off</Allow>
			<Name>Google</Name>
			<Id />
			<Secret />
			<Scopes>auth filestorage</Scopes>
			<ApiKey />
		</Google>
		<Dropbox>
			<Allow>Off</Allow>
			<Name>Dropbox</Name>
			<Id />
			<Secret />
			<Scopes>filestorage</Scopes>
			<ApiKey />
		</Dropbox>
		<Facebook>
			<Allow>Off</Allow>
			<Name>Facebook</Name>
			<Id />
			<Secret />
			<Scopes>auth</Scopes>
			<ApiKey />
		</Facebook>
		<Twitter>
			<Allow>Off</Allow>
			<Name>Twitter</Name>
			<Id />
			<Secret />
			<Scopes>auth</Scopes>
			<ApiKey />
		</Twitter>
	</Socials>
	<Helpdesk>
		<AllowHelpdesk>Off</AllowHelpdesk>
		<AdminEmailAccount />
		<ClientIframeUrl />
		<AgentIframeUrl />
		<SiteName />
		<StyleAllow>Off</StyleAllow>
		<StyleImage />
		<StyleText />
		<FetcherType>NONE</FetcherType>
		<FacebookAllow>Off</FacebookAllow>
		<FacebookId />
		<FacebookSecret />
		<GoogleAllow>Off</GoogleAllow>
		<GoogleId />
		<GoogleSecret />
		<TwitterAllow>Off</TwitterAllow>
		<TwitterId />
		<TwitterSecret />
	</Helpdesk>
</Settings>';?>
