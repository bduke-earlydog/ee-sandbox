<?php

namespace ExpressionEngine\Dependency;

// This file was auto-generated from sdk-root/src/data/resource-groups/2017-11-27/api-2.json
return ['version' => '2.0', 'metadata' => ['apiVersion' => '2017-11-27', 'endpointPrefix' => 'resource-groups', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'Resource Groups', 'serviceFullName' => 'AWS Resource Groups', 'serviceId' => 'Resource Groups', 'signatureVersion' => 'v4', 'signingName' => 'resource-groups', 'uid' => 'resource-groups-2017-11-27'], 'operations' => ['CreateGroup' => ['name' => 'CreateGroup', 'http' => ['method' => 'POST', 'requestUri' => '/groups'], 'input' => ['shape' => 'CreateGroupInput'], 'output' => ['shape' => 'CreateGroupOutput'], 'errors' => [['shape' => 'BadRequestException'], ['shape' => 'ForbiddenException'], ['shape' => 'MethodNotAllowedException'], ['shape' => 'TooManyRequestsException'], ['shape' => 'InternalServerErrorException']]], 'DeleteGroup' => ['name' => 'DeleteGroup', 'http' => ['method' => 'POST', 'requestUri' => '/delete-group'], 'input' => ['shape' => 'DeleteGroupInput'], 'output' => ['shape' => 'DeleteGroupOutput'], 'errors' => [['shape' => 'BadRequestException'], ['shape' => 'ForbiddenException'], ['shape' => 'NotFoundException'], ['shape' => 'MethodNotAllowedException'], ['shape' => 'TooManyRequestsException'], ['shape' => 'InternalServerErrorException']]], 'GetAccountSettings' => ['name' => 'GetAccountSettings', 'http' => ['method' => 'POST', 'requestUri' => '/get-account-settings'], 'output' => ['shape' => 'GetAccountSettingsOutput'], 'errors' => [['shape' => 'BadRequestException'], ['shape' => 'ForbiddenException'], ['shape' => 'MethodNotAllowedException'], ['shape' => 'TooManyRequestsException'], ['shape' => 'InternalServerErrorException']]], 'GetGroup' => ['name' => 'GetGroup', 'http' => ['method' => 'POST', 'requestUri' => '/get-group'], 'input' => ['shape' => 'GetGroupInput'], 'output' => ['shape' => 'GetGroupOutput'], 'errors' => [['shape' => 'BadRequestException'], ['shape' => 'ForbiddenException'], ['shape' => 'NotFoundException'], ['shape' => 'MethodNotAllowedException'], ['shape' => 'TooManyRequestsException'], ['shape' => 'InternalServerErrorException']]], 'GetGroupConfiguration' => ['name' => 'GetGroupConfiguration', 'http' => ['method' => 'POST', 'requestUri' => '/get-group-configuration'], 'input' => ['shape' => 'GetGroupConfigurationInput'], 'output' => ['shape' => 'GetGroupConfigurationOutput'], 'errors' => [['shape' => 'BadRequestException'], ['shape' => 'ForbiddenException'], ['shape' => 'NotFoundException'], ['shape' => 'MethodNotAllowedException'], ['shape' => 'TooManyRequestsException'], ['shape' => 'InternalServerErrorException']]], 'GetGroupQuery' => ['name' => 'GetGroupQuery', 'http' => ['method' => 'POST', 'requestUri' => '/get-group-query'], 'input' => ['shape' => 'GetGroupQueryInput'], 'output' => ['shape' => 'GetGroupQueryOutput'], 'errors' => [['shape' => 'BadRequestException'], ['shape' => 'ForbiddenException'], ['shape' => 'NotFoundException'], ['shape' => 'MethodNotAllowedException'], ['shape' => 'TooManyRequestsException'], ['shape' => 'InternalServerErrorException']]], 'GetTags' => ['name' => 'GetTags', 'http' => ['method' => 'GET', 'requestUri' => '/resources/{Arn}/tags'], 'input' => ['shape' => 'GetTagsInput'], 'output' => ['shape' => 'GetTagsOutput'], 'errors' => [['shape' => 'BadRequestException'], ['shape' => 'ForbiddenException'], ['shape' => 'NotFoundException'], ['shape' => 'MethodNotAllowedException'], ['shape' => 'TooManyRequestsException'], ['shape' => 'InternalServerErrorException']]], 'GroupResources' => ['name' => 'GroupResources', 'http' => ['method' => 'POST', 'requestUri' => '/group-resources'], 'input' => ['shape' => 'GroupResourcesInput'], 'output' => ['shape' => 'GroupResourcesOutput'], 'errors' => [['shape' => 'BadRequestException'], ['shape' => 'ForbiddenException'], ['shape' => 'NotFoundException'], ['shape' => 'MethodNotAllowedException'], ['shape' => 'TooManyRequestsException'], ['shape' => 'InternalServerErrorException']]], 'ListGroupResources' => ['name' => 'ListGroupResources', 'http' => ['method' => 'POST', 'requestUri' => '/list-group-resources'], 'input' => ['shape' => 'ListGroupResourcesInput'], 'output' => ['shape' => 'ListGroupResourcesOutput'], 'errors' => [['shape' => 'UnauthorizedException'], ['shape' => 'BadRequestException'], ['shape' => 'ForbiddenException'], ['shape' => 'NotFoundException'], ['shape' => 'MethodNotAllowedException'], ['shape' => 'TooManyRequestsException'], ['shape' => 'InternalServerErrorException']]], 'ListGroups' => ['name' => 'ListGroups', 'http' => ['method' => 'POST', 'requestUri' => '/groups-list'], 'input' => ['shape' => 'ListGroupsInput'], 'output' => ['shape' => 'ListGroupsOutput'], 'errors' => [['shape' => 'BadRequestException'], ['shape' => 'ForbiddenException'], ['shape' => 'MethodNotAllowedException'], ['shape' => 'TooManyRequestsException'], ['shape' => 'InternalServerErrorException']]], 'PutGroupConfiguration' => ['name' => 'PutGroupConfiguration', 'http' => ['method' => 'POST', 'requestUri' => '/put-group-configuration', 'responseCode' => 202], 'input' => ['shape' => 'PutGroupConfigurationInput'], 'output' => ['shape' => 'PutGroupConfigurationOutput'], 'errors' => [['shape' => 'BadRequestException'], ['shape' => 'ForbiddenException'], ['shape' => 'NotFoundException'], ['shape' => 'MethodNotAllowedException'], ['shape' => 'TooManyRequestsException'], ['shape' => 'InternalServerErrorException']]], 'SearchResources' => ['name' => 'SearchResources', 'http' => ['method' => 'POST', 'requestUri' => '/resources/search'], 'input' => ['shape' => 'SearchResourcesInput'], 'output' => ['shape' => 'SearchResourcesOutput'], 'errors' => [['shape' => 'UnauthorizedException'], ['shape' => 'BadRequestException'], ['shape' => 'ForbiddenException'], ['shape' => 'MethodNotAllowedException'], ['shape' => 'TooManyRequestsException'], ['shape' => 'InternalServerErrorException']]], 'Tag' => ['name' => 'Tag', 'http' => ['method' => 'PUT', 'requestUri' => '/resources/{Arn}/tags'], 'input' => ['shape' => 'TagInput'], 'output' => ['shape' => 'TagOutput'], 'errors' => [['shape' => 'BadRequestException'], ['shape' => 'ForbiddenException'], ['shape' => 'NotFoundException'], ['shape' => 'MethodNotAllowedException'], ['shape' => 'TooManyRequestsException'], ['shape' => 'InternalServerErrorException']]], 'UngroupResources' => ['name' => 'UngroupResources', 'http' => ['method' => 'POST', 'requestUri' => '/ungroup-resources'], 'input' => ['shape' => 'UngroupResourcesInput'], 'output' => ['shape' => 'UngroupResourcesOutput'], 'errors' => [['shape' => 'BadRequestException'], ['shape' => 'ForbiddenException'], ['shape' => 'NotFoundException'], ['shape' => 'MethodNotAllowedException'], ['shape' => 'TooManyRequestsException'], ['shape' => 'InternalServerErrorException']]], 'Untag' => ['name' => 'Untag', 'http' => ['method' => 'PATCH', 'requestUri' => '/resources/{Arn}/tags'], 'input' => ['shape' => 'UntagInput'], 'output' => ['shape' => 'UntagOutput'], 'errors' => [['shape' => 'BadRequestException'], ['shape' => 'ForbiddenException'], ['shape' => 'NotFoundException'], ['shape' => 'MethodNotAllowedException'], ['shape' => 'TooManyRequestsException'], ['shape' => 'InternalServerErrorException']]], 'UpdateAccountSettings' => ['name' => 'UpdateAccountSettings', 'http' => ['method' => 'POST', 'requestUri' => '/update-account-settings'], 'input' => ['shape' => 'UpdateAccountSettingsInput'], 'output' => ['shape' => 'UpdateAccountSettingsOutput'], 'errors' => [['shape' => 'BadRequestException'], ['shape' => 'ForbiddenException'], ['shape' => 'MethodNotAllowedException'], ['shape' => 'TooManyRequestsException'], ['shape' => 'InternalServerErrorException']]], 'UpdateGroup' => ['name' => 'UpdateGroup', 'http' => ['method' => 'POST', 'requestUri' => '/update-group'], 'input' => ['shape' => 'UpdateGroupInput'], 'output' => ['shape' => 'UpdateGroupOutput'], 'errors' => [['shape' => 'BadRequestException'], ['shape' => 'ForbiddenException'], ['shape' => 'NotFoundException'], ['shape' => 'MethodNotAllowedException'], ['shape' => 'TooManyRequestsException'], ['shape' => 'InternalServerErrorException']]], 'UpdateGroupQuery' => ['name' => 'UpdateGroupQuery', 'http' => ['method' => 'POST', 'requestUri' => '/update-group-query'], 'input' => ['shape' => 'UpdateGroupQueryInput'], 'output' => ['shape' => 'UpdateGroupQueryOutput'], 'errors' => [['shape' => 'BadRequestException'], ['shape' => 'ForbiddenException'], ['shape' => 'NotFoundException'], ['shape' => 'MethodNotAllowedException'], ['shape' => 'TooManyRequestsException'], ['shape' => 'InternalServerErrorException']]]], 'shapes' => ['AccountSettings' => ['type' => 'structure', 'members' => ['GroupLifecycleEventsDesiredStatus' => ['shape' => 'GroupLifecycleEventsDesiredStatus'], 'GroupLifecycleEventsStatus' => ['shape' => 'GroupLifecycleEventsStatus'], 'GroupLifecycleEventsStatusMessage' => ['shape' => 'GroupLifecycleEventsStatusMessage']]], 'BadRequestException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage']], 'error' => ['httpStatusCode' => 400], 'exception' => \true], 'CreateGroupInput' => ['type' => 'structure', 'required' => ['Name'], 'members' => ['Name' => ['shape' => 'GroupName'], 'Description' => ['shape' => 'Description'], 'ResourceQuery' => ['shape' => 'ResourceQuery'], 'Tags' => ['shape' => 'Tags'], 'Configuration' => ['shape' => 'GroupConfigurationList']]], 'CreateGroupOutput' => ['type' => 'structure', 'members' => ['Group' => ['shape' => 'Group'], 'ResourceQuery' => ['shape' => 'ResourceQuery'], 'Tags' => ['shape' => 'Tags'], 'GroupConfiguration' => ['shape' => 'GroupConfiguration']]], 'DeleteGroupInput' => ['type' => 'structure', 'members' => ['GroupName' => ['shape' => 'GroupName', 'deprecated' => \true, 'deprecatedMessage' => 'This field is deprecated, use Group instead.'], 'Group' => ['shape' => 'GroupString']]], 'DeleteGroupOutput' => ['type' => 'structure', 'members' => ['Group' => ['shape' => 'Group']]], 'Description' => ['type' => 'string', 'max' => 1024, 'pattern' => '[\\sa-zA-Z0-9_\\.-]*'], 'ErrorCode' => ['type' => 'string', 'max' => 128, 'min' => 1], 'ErrorMessage' => ['type' => 'string', 'max' => 1024, 'min' => 1], 'FailedResource' => ['type' => 'structure', 'members' => ['ResourceArn' => ['shape' => 'ResourceArn'], 'ErrorMessage' => ['shape' => 'ErrorMessage'], 'ErrorCode' => ['shape' => 'ErrorCode']]], 'FailedResourceList' => ['type' => 'list', 'member' => ['shape' => 'FailedResource']], 'ForbiddenException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage']], 'error' => ['httpStatusCode' => 403], 'exception' => \true], 'GetAccountSettingsOutput' => ['type' => 'structure', 'members' => ['AccountSettings' => ['shape' => 'AccountSettings']]], 'GetGroupConfigurationInput' => ['type' => 'structure', 'members' => ['Group' => ['shape' => 'GroupString']]], 'GetGroupConfigurationOutput' => ['type' => 'structure', 'members' => ['GroupConfiguration' => ['shape' => 'GroupConfiguration']]], 'GetGroupInput' => ['type' => 'structure', 'members' => ['GroupName' => ['shape' => 'GroupName', 'deprecated' => \true, 'deprecatedMessage' => 'This field is deprecated, use Group instead.'], 'Group' => ['shape' => 'GroupString']]], 'GetGroupOutput' => ['type' => 'structure', 'members' => ['Group' => ['shape' => 'Group']]], 'GetGroupQueryInput' => ['type' => 'structure', 'members' => ['GroupName' => ['shape' => 'GroupName', 'deprecated' => \true, 'deprecatedMessage' => 'This field is deprecated, use Group instead.'], 'Group' => ['shape' => 'GroupString']]], 'GetGroupQueryOutput' => ['type' => 'structure', 'members' => ['GroupQuery' => ['shape' => 'GroupQuery']]], 'GetTagsInput' => ['type' => 'structure', 'required' => ['Arn'], 'members' => ['Arn' => ['shape' => 'GroupArn', 'location' => 'uri', 'locationName' => 'Arn']]], 'GetTagsOutput' => ['type' => 'structure', 'members' => ['Arn' => ['shape' => 'GroupArn'], 'Tags' => ['shape' => 'Tags']]], 'Group' => ['type' => 'structure', 'required' => ['GroupArn', 'Name'], 'members' => ['GroupArn' => ['shape' => 'GroupArn'], 'Name' => ['shape' => 'GroupName'], 'Description' => ['shape' => 'Description']]], 'GroupArn' => ['type' => 'string', 'max' => 1600, 'min' => 12, 'pattern' => 'arn:aws(-[a-z]+)*:resource-groups:[a-z]{2}(-[a-z]+)+-\\d{1}:[0-9]{12}:group/[a-zA-Z0-9_\\.-]{1,300}'], 'GroupConfiguration' => ['type' => 'structure', 'members' => ['Configuration' => ['shape' => 'GroupConfigurationList'], 'ProposedConfiguration' => ['shape' => 'GroupConfigurationList'], 'Status' => ['shape' => 'GroupConfigurationStatus'], 'FailureReason' => ['shape' => 'GroupConfigurationFailureReason']]], 'GroupConfigurationFailureReason' => ['type' => 'string'], 'GroupConfigurationItem' => ['type' => 'structure', 'required' => ['Type'], 'members' => ['Type' => ['shape' => 'GroupConfigurationType'], 'Parameters' => ['shape' => 'GroupParameterList']]], 'GroupConfigurationList' => ['type' => 'list', 'member' => ['shape' => 'GroupConfigurationItem'], 'max' => 2], 'GroupConfigurationParameter' => ['type' => 'structure', 'required' => ['Name'], 'members' => ['Name' => ['shape' => 'GroupConfigurationParameterName'], 'Values' => ['shape' => 'GroupConfigurationParameterValueList']]], 'GroupConfigurationParameterName' => ['type' => 'string', 'max' => 80, 'min' => 1, 'pattern' => '[a-z-]+'], 'GroupConfigurationParameterValue' => ['type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '[a-zA-Z0-9:\\/\\._-]+'], 'GroupConfigurationParameterValueList' => ['type' => 'list', 'member' => ['shape' => 'GroupConfigurationParameterValue']], 'GroupConfigurationStatus' => ['type' => 'string', 'enum' => ['UPDATING', 'UPDATE_COMPLETE', 'UPDATE_FAILED']], 'GroupConfigurationType' => ['type' => 'string', 'max' => 40, 'pattern' => 'AWS::[a-zA-Z0-9]+::[a-zA-Z0-9]+'], 'GroupFilter' => ['type' => 'structure', 'required' => ['Name', 'Values'], 'members' => ['Name' => ['shape' => 'GroupFilterName'], 'Values' => ['shape' => 'GroupFilterValues']]], 'GroupFilterList' => ['type' => 'list', 'member' => ['shape' => 'GroupFilter']], 'GroupFilterName' => ['type' => 'string', 'enum' => ['resource-type', 'configuration-type']], 'GroupFilterValue' => ['type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => 'AWS::(AllSupported|[a-zA-Z0-9]+::[a-zA-Z0-9]+)'], 'GroupFilterValues' => ['type' => 'list', 'member' => ['shape' => 'GroupFilterValue'], 'max' => 5, 'min' => 1], 'GroupIdentifier' => ['type' => 'structure', 'members' => ['GroupName' => ['shape' => 'GroupName'], 'GroupArn' => ['shape' => 'GroupArn']]], 'GroupIdentifierList' => ['type' => 'list', 'member' => ['shape' => 'GroupIdentifier']], 'GroupLifecycleEventsDesiredStatus' => ['type' => 'string', 'enum' => ['ACTIVE', 'INACTIVE']], 'GroupLifecycleEventsStatus' => ['type' => 'string', 'enum' => ['ACTIVE', 'INACTIVE', 'IN_PROGRESS', 'ERROR']], 'GroupLifecycleEventsStatusMessage' => ['type' => 'string', 'max' => 1024, 'min' => 1], 'GroupList' => ['type' => 'list', 'member' => ['shape' => 'Group']], 'GroupName' => ['type' => 'string', 'max' => 300, 'min' => 1, 'pattern' => '[a-zA-Z0-9_\\.-]+'], 'GroupParameterList' => ['type' => 'list', 'member' => ['shape' => 'GroupConfigurationParameter']], 'GroupQuery' => ['type' => 'structure', 'required' => ['GroupName', 'ResourceQuery'], 'members' => ['GroupName' => ['shape' => 'GroupName'], 'ResourceQuery' => ['shape' => 'ResourceQuery']]], 'GroupResourcesInput' => ['type' => 'structure', 'required' => ['Group', 'ResourceArns'], 'members' => ['Group' => ['shape' => 'GroupString'], 'ResourceArns' => ['shape' => 'ResourceArnList']]], 'GroupResourcesOutput' => ['type' => 'structure', 'members' => ['Succeeded' => ['shape' => 'ResourceArnList'], 'Failed' => ['shape' => 'FailedResourceList'], 'Pending' => ['shape' => 'PendingResourceList']]], 'GroupString' => ['type' => 'string', 'max' => 1600, 'min' => 1, 'pattern' => '(arn:aws(-[a-z]+)*:resource-groups:[a-z]{2}(-[a-z]+)+-\\d{1}:[0-9]{12}:group/)?[a-zA-Z0-9_\\.-]{1,300}'], 'InternalServerErrorException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage']], 'error' => ['httpStatusCode' => 500], 'exception' => \true], 'ListGroupResourcesInput' => ['type' => 'structure', 'members' => ['GroupName' => ['shape' => 'GroupName', 'deprecated' => \true, 'deprecatedMessage' => 'This field is deprecated, use Group instead.'], 'Group' => ['shape' => 'GroupString'], 'Filters' => ['shape' => 'ResourceFilterList'], 'MaxResults' => ['shape' => 'MaxResults'], 'NextToken' => ['shape' => 'NextToken']]], 'ListGroupResourcesItem' => ['type' => 'structure', 'members' => ['Identifier' => ['shape' => 'ResourceIdentifier'], 'Status' => ['shape' => 'ResourceStatus']]], 'ListGroupResourcesItemList' => ['type' => 'list', 'member' => ['shape' => 'ListGroupResourcesItem']], 'ListGroupResourcesOutput' => ['type' => 'structure', 'members' => ['Resources' => ['shape' => 'ListGroupResourcesItemList'], 'ResourceIdentifiers' => ['shape' => 'ResourceIdentifierList', 'deprecated' => \true, 'deprecatedMessage' => 'This field is deprecated, use Resources instead.'], 'NextToken' => ['shape' => 'NextToken'], 'QueryErrors' => ['shape' => 'QueryErrorList']]], 'ListGroupsInput' => ['type' => 'structure', 'members' => ['Filters' => ['shape' => 'GroupFilterList'], 'MaxResults' => ['shape' => 'MaxResults', 'location' => 'querystring', 'locationName' => 'maxResults'], 'NextToken' => ['shape' => 'NextToken', 'location' => 'querystring', 'locationName' => 'nextToken']]], 'ListGroupsOutput' => ['type' => 'structure', 'members' => ['GroupIdentifiers' => ['shape' => 'GroupIdentifierList'], 'Groups' => ['shape' => 'GroupList', 'deprecated' => \true, 'deprecatedMessage' => 'This field is deprecated, use GroupIdentifiers instead.'], 'NextToken' => ['shape' => 'NextToken']]], 'MaxResults' => ['type' => 'integer', 'max' => 50, 'min' => 1], 'MethodNotAllowedException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage']], 'error' => ['httpStatusCode' => 405], 'exception' => \true], 'NextToken' => ['type' => 'string', 'max' => 8192, 'min' => 0, 'pattern' => '^[a-zA-Z0-9+/]*={0,2}$'], 'NotFoundException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage']], 'error' => ['httpStatusCode' => 404], 'exception' => \true], 'PendingResource' => ['type' => 'structure', 'members' => ['ResourceArn' => ['shape' => 'ResourceArn']]], 'PendingResourceList' => ['type' => 'list', 'member' => ['shape' => 'PendingResource']], 'PutGroupConfigurationInput' => ['type' => 'structure', 'members' => ['Group' => ['shape' => 'GroupString'], 'Configuration' => ['shape' => 'GroupConfigurationList']]], 'PutGroupConfigurationOutput' => ['type' => 'structure', 'members' => []], 'Query' => ['type' => 'string', 'max' => 4096, 'pattern' => '[\\s\\S]*'], 'QueryError' => ['type' => 'structure', 'members' => ['ErrorCode' => ['shape' => 'QueryErrorCode'], 'Message' => ['shape' => 'QueryErrorMessage']]], 'QueryErrorCode' => ['type' => 'string', 'enum' => ['CLOUDFORMATION_STACK_INACTIVE', 'CLOUDFORMATION_STACK_NOT_EXISTING', 'CLOUDFORMATION_STACK_UNASSUMABLE_ROLE']], 'QueryErrorList' => ['type' => 'list', 'member' => ['shape' => 'QueryError']], 'QueryErrorMessage' => ['type' => 'string'], 'QueryType' => ['type' => 'string', 'enum' => ['TAG_FILTERS_1_0', 'CLOUDFORMATION_STACK_1_0'], 'max' => 128, 'min' => 1, 'pattern' => '^\\w+$'], 'ResourceArn' => ['type' => 'string', 'pattern' => 'arn:aws(-[a-z]+)*:[a-z0-9\\-]*:([a-z]{2}(-[a-z]+)+-\\d{1})?:([0-9]{12})?:.+'], 'ResourceArnList' => ['type' => 'list', 'member' => ['shape' => 'ResourceArn'], 'max' => 10, 'min' => 1], 'ResourceFilter' => ['type' => 'structure', 'required' => ['Name', 'Values'], 'members' => ['Name' => ['shape' => 'ResourceFilterName'], 'Values' => ['shape' => 'ResourceFilterValues']]], 'ResourceFilterList' => ['type' => 'list', 'member' => ['shape' => 'ResourceFilter']], 'ResourceFilterName' => ['type' => 'string', 'enum' => ['resource-type']], 'ResourceFilterValue' => ['type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => 'AWS::[a-zA-Z0-9]+::[a-zA-Z0-9]+'], 'ResourceFilterValues' => ['type' => 'list', 'member' => ['shape' => 'ResourceFilterValue'], 'max' => 5, 'min' => 1], 'ResourceIdentifier' => ['type' => 'structure', 'members' => ['ResourceArn' => ['shape' => 'ResourceArn'], 'ResourceType' => ['shape' => 'ResourceType']]], 'ResourceIdentifierList' => ['type' => 'list', 'member' => ['shape' => 'ResourceIdentifier']], 'ResourceQuery' => ['type' => 'structure', 'required' => ['Type', 'Query'], 'members' => ['Type' => ['shape' => 'QueryType'], 'Query' => ['shape' => 'Query']]], 'ResourceStatus' => ['type' => 'structure', 'members' => ['Name' => ['shape' => 'ResourceStatusValue']]], 'ResourceStatusValue' => ['type' => 'string', 'enum' => ['PENDING']], 'ResourceType' => ['type' => 'string', 'pattern' => 'AWS::[a-zA-Z0-9]+::\\w+'], 'SearchResourcesInput' => ['type' => 'structure', 'required' => ['ResourceQuery'], 'members' => ['ResourceQuery' => ['shape' => 'ResourceQuery'], 'MaxResults' => ['shape' => 'MaxResults'], 'NextToken' => ['shape' => 'NextToken']]], 'SearchResourcesOutput' => ['type' => 'structure', 'members' => ['ResourceIdentifiers' => ['shape' => 'ResourceIdentifierList'], 'NextToken' => ['shape' => 'NextToken'], 'QueryErrors' => ['shape' => 'QueryErrorList']]], 'TagInput' => ['type' => 'structure', 'required' => ['Arn', 'Tags'], 'members' => ['Arn' => ['shape' => 'GroupArn', 'location' => 'uri', 'locationName' => 'Arn'], 'Tags' => ['shape' => 'Tags']]], 'TagKey' => ['type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$'], 'TagKeyList' => ['type' => 'list', 'member' => ['shape' => 'TagKey']], 'TagOutput' => ['type' => 'structure', 'members' => ['Arn' => ['shape' => 'GroupArn'], 'Tags' => ['shape' => 'Tags']]], 'TagValue' => ['type' => 'string', 'max' => 256, 'min' => 0, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$'], 'Tags' => ['type' => 'map', 'key' => ['shape' => 'TagKey'], 'value' => ['shape' => 'TagValue']], 'TooManyRequestsException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage']], 'error' => ['httpStatusCode' => 429], 'exception' => \true], 'UnauthorizedException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage']], 'error' => ['httpStatusCode' => 401], 'exception' => \true], 'UngroupResourcesInput' => ['type' => 'structure', 'required' => ['Group', 'ResourceArns'], 'members' => ['Group' => ['shape' => 'GroupString'], 'ResourceArns' => ['shape' => 'ResourceArnList']]], 'UngroupResourcesOutput' => ['type' => 'structure', 'members' => ['Succeeded' => ['shape' => 'ResourceArnList'], 'Failed' => ['shape' => 'FailedResourceList'], 'Pending' => ['shape' => 'PendingResourceList']]], 'UntagInput' => ['type' => 'structure', 'required' => ['Arn', 'Keys'], 'members' => ['Arn' => ['shape' => 'GroupArn', 'location' => 'uri', 'locationName' => 'Arn'], 'Keys' => ['shape' => 'TagKeyList']]], 'UntagOutput' => ['type' => 'structure', 'members' => ['Arn' => ['shape' => 'GroupArn'], 'Keys' => ['shape' => 'TagKeyList']]], 'UpdateAccountSettingsInput' => ['type' => 'structure', 'members' => ['GroupLifecycleEventsDesiredStatus' => ['shape' => 'GroupLifecycleEventsDesiredStatus']]], 'UpdateAccountSettingsOutput' => ['type' => 'structure', 'members' => ['AccountSettings' => ['shape' => 'AccountSettings']]], 'UpdateGroupInput' => ['type' => 'structure', 'members' => ['GroupName' => ['shape' => 'GroupName', 'deprecated' => \true, 'deprecatedMessage' => 'This field is deprecated, use Group instead.'], 'Group' => ['shape' => 'GroupString'], 'Description' => ['shape' => 'Description']]], 'UpdateGroupOutput' => ['type' => 'structure', 'members' => ['Group' => ['shape' => 'Group']]], 'UpdateGroupQueryInput' => ['type' => 'structure', 'required' => ['ResourceQuery'], 'members' => ['GroupName' => ['shape' => 'GroupName', 'deprecated' => \true, 'deprecatedMessage' => 'This field is deprecated, use Group instead.'], 'Group' => ['shape' => 'GroupString'], 'ResourceQuery' => ['shape' => 'ResourceQuery']]], 'UpdateGroupQueryOutput' => ['type' => 'structure', 'members' => ['GroupQuery' => ['shape' => 'GroupQuery']]]]];
