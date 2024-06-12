<?php

namespace ExpressionEngine\Dependency;

// This file was auto-generated from sdk-root/src/data/route53-recovery-cluster/2019-12-02/api-2.json
return ['version' => '2.0', 'metadata' => ['apiVersion' => '2019-12-02', 'endpointPrefix' => 'route53-recovery-cluster', 'jsonVersion' => '1.0', 'protocol' => 'json', 'serviceFullName' => 'Route53 Recovery Cluster', 'serviceId' => 'Route53 Recovery Cluster', 'signatureVersion' => 'v4', 'signingName' => 'route53-recovery-cluster', 'targetPrefix' => 'ToggleCustomerAPI', 'uid' => 'route53-recovery-cluster-2019-12-02'], 'operations' => ['GetRoutingControlState' => ['name' => 'GetRoutingControlState', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'GetRoutingControlStateRequest'], 'output' => ['shape' => 'GetRoutingControlStateResponse'], 'errors' => [['shape' => 'AccessDeniedException'], ['shape' => 'InternalServerException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ValidationException'], ['shape' => 'ThrottlingException'], ['shape' => 'EndpointTemporarilyUnavailableException']]], 'ListRoutingControls' => ['name' => 'ListRoutingControls', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'ListRoutingControlsRequest'], 'output' => ['shape' => 'ListRoutingControlsResponse'], 'errors' => [['shape' => 'AccessDeniedException'], ['shape' => 'InternalServerException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ValidationException'], ['shape' => 'ThrottlingException'], ['shape' => 'EndpointTemporarilyUnavailableException']]], 'UpdateRoutingControlState' => ['name' => 'UpdateRoutingControlState', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'UpdateRoutingControlStateRequest'], 'output' => ['shape' => 'UpdateRoutingControlStateResponse'], 'errors' => [['shape' => 'AccessDeniedException'], ['shape' => 'InternalServerException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ValidationException'], ['shape' => 'ThrottlingException'], ['shape' => 'EndpointTemporarilyUnavailableException'], ['shape' => 'ConflictException']]], 'UpdateRoutingControlStates' => ['name' => 'UpdateRoutingControlStates', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'UpdateRoutingControlStatesRequest'], 'output' => ['shape' => 'UpdateRoutingControlStatesResponse'], 'errors' => [['shape' => 'AccessDeniedException'], ['shape' => 'InternalServerException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ValidationException'], ['shape' => 'ThrottlingException'], ['shape' => 'EndpointTemporarilyUnavailableException'], ['shape' => 'ConflictException'], ['shape' => 'ServiceLimitExceededException']]]], 'shapes' => ['AccessDeniedException' => ['type' => 'structure', 'required' => ['message'], 'members' => ['message' => ['shape' => 'String']], 'exception' => \true], 'Arn' => ['type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^[A-Za-z0-9:.\\/_-]*$'], 'Arns' => ['type' => 'list', 'member' => ['shape' => 'Arn']], 'ConflictException' => ['type' => 'structure', 'required' => ['message', 'resourceId', 'resourceType'], 'members' => ['message' => ['shape' => 'String'], 'resourceId' => ['shape' => 'String'], 'resourceType' => ['shape' => 'String']], 'exception' => \true], 'ControlPanelName' => ['type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '^\\S+$'], 'EndpointTemporarilyUnavailableException' => ['type' => 'structure', 'required' => ['message'], 'members' => ['message' => ['shape' => 'String']], 'exception' => \true], 'GetRoutingControlStateRequest' => ['type' => 'structure', 'required' => ['RoutingControlArn'], 'members' => ['RoutingControlArn' => ['shape' => 'Arn']]], 'GetRoutingControlStateResponse' => ['type' => 'structure', 'required' => ['RoutingControlArn', 'RoutingControlState'], 'members' => ['RoutingControlArn' => ['shape' => 'Arn'], 'RoutingControlState' => ['shape' => 'RoutingControlState'], 'RoutingControlName' => ['shape' => 'RoutingControlName']]], 'InternalServerException' => ['type' => 'structure', 'required' => ['message'], 'members' => ['message' => ['shape' => 'String'], 'retryAfterSeconds' => ['shape' => 'RetryAfterSeconds']], 'exception' => \true, 'fault' => \true], 'ListRoutingControlsRequest' => ['type' => 'structure', 'members' => ['ControlPanelArn' => ['shape' => 'Arn'], 'NextToken' => ['shape' => 'PageToken'], 'MaxResults' => ['shape' => 'MaxResults', 'box' => \true]]], 'ListRoutingControlsResponse' => ['type' => 'structure', 'required' => ['RoutingControls'], 'members' => ['RoutingControls' => ['shape' => 'RoutingControls'], 'NextToken' => ['shape' => 'PageToken']]], 'MaxResults' => ['type' => 'integer', 'min' => 1], 'PageToken' => ['type' => 'string', 'max' => 8096, 'min' => 1, 'pattern' => '[\\S]*'], 'ResourceNotFoundException' => ['type' => 'structure', 'required' => ['message', 'resourceId', 'resourceType'], 'members' => ['message' => ['shape' => 'String'], 'resourceId' => ['shape' => 'String'], 'resourceType' => ['shape' => 'String']], 'exception' => \true], 'RetryAfterSeconds' => ['type' => 'integer'], 'RoutingControl' => ['type' => 'structure', 'members' => ['ControlPanelArn' => ['shape' => 'Arn'], 'ControlPanelName' => ['shape' => 'ControlPanelName'], 'RoutingControlArn' => ['shape' => 'Arn'], 'RoutingControlName' => ['shape' => 'RoutingControlName'], 'RoutingControlState' => ['shape' => 'RoutingControlState']]], 'RoutingControlName' => ['type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '^\\S+$'], 'RoutingControlState' => ['type' => 'string', 'enum' => ['On', 'Off']], 'RoutingControls' => ['type' => 'list', 'member' => ['shape' => 'RoutingControl']], 'ServiceLimitExceededException' => ['type' => 'structure', 'required' => ['message', 'limitCode', 'serviceCode'], 'members' => ['message' => ['shape' => 'String'], 'resourceId' => ['shape' => 'String'], 'resourceType' => ['shape' => 'String'], 'limitCode' => ['shape' => 'String'], 'serviceCode' => ['shape' => 'String']], 'exception' => \true], 'String' => ['type' => 'string'], 'ThrottlingException' => ['type' => 'structure', 'required' => ['message'], 'members' => ['message' => ['shape' => 'String'], 'retryAfterSeconds' => ['shape' => 'RetryAfterSeconds']], 'exception' => \true], 'UpdateRoutingControlStateEntries' => ['type' => 'list', 'member' => ['shape' => 'UpdateRoutingControlStateEntry']], 'UpdateRoutingControlStateEntry' => ['type' => 'structure', 'required' => ['RoutingControlArn', 'RoutingControlState'], 'members' => ['RoutingControlArn' => ['shape' => 'Arn'], 'RoutingControlState' => ['shape' => 'RoutingControlState']]], 'UpdateRoutingControlStateRequest' => ['type' => 'structure', 'required' => ['RoutingControlArn', 'RoutingControlState'], 'members' => ['RoutingControlArn' => ['shape' => 'Arn'], 'RoutingControlState' => ['shape' => 'RoutingControlState'], 'SafetyRulesToOverride' => ['shape' => 'Arns']]], 'UpdateRoutingControlStateResponse' => ['type' => 'structure', 'members' => []], 'UpdateRoutingControlStatesRequest' => ['type' => 'structure', 'required' => ['UpdateRoutingControlStateEntries'], 'members' => ['UpdateRoutingControlStateEntries' => ['shape' => 'UpdateRoutingControlStateEntries'], 'SafetyRulesToOverride' => ['shape' => 'Arns']]], 'UpdateRoutingControlStatesResponse' => ['type' => 'structure', 'members' => []], 'ValidationException' => ['type' => 'structure', 'required' => ['message'], 'members' => ['message' => ['shape' => 'String'], 'reason' => ['shape' => 'ValidationExceptionReason'], 'fields' => ['shape' => 'ValidationExceptionFieldList']], 'exception' => \true], 'ValidationExceptionField' => ['type' => 'structure', 'required' => ['name', 'message'], 'members' => ['name' => ['shape' => 'String'], 'message' => ['shape' => 'String']]], 'ValidationExceptionFieldList' => ['type' => 'list', 'member' => ['shape' => 'ValidationExceptionField']], 'ValidationExceptionReason' => ['type' => 'string', 'enum' => ['unknownOperation', 'cannotParse', 'fieldValidationFailed', 'other']]]];
