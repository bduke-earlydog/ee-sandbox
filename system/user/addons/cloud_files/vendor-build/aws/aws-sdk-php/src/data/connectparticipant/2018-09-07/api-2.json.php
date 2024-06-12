<?php

namespace ExpressionEngine\Dependency;

// This file was auto-generated from sdk-root/src/data/connectparticipant/2018-09-07/api-2.json
return ['version' => '2.0', 'metadata' => ['apiVersion' => '2018-09-07', 'endpointPrefix' => 'participant.connect', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'Amazon Connect Participant', 'serviceFullName' => 'Amazon Connect Participant Service', 'serviceId' => 'ConnectParticipant', 'signatureVersion' => 'v4', 'signingName' => 'execute-api', 'uid' => 'connectparticipant-2018-09-07'], 'operations' => ['CompleteAttachmentUpload' => ['name' => 'CompleteAttachmentUpload', 'http' => ['method' => 'POST', 'requestUri' => '/participant/complete-attachment-upload'], 'input' => ['shape' => 'CompleteAttachmentUploadRequest'], 'output' => ['shape' => 'CompleteAttachmentUploadResponse'], 'errors' => [['shape' => 'AccessDeniedException'], ['shape' => 'InternalServerException'], ['shape' => 'ThrottlingException'], ['shape' => 'ValidationException'], ['shape' => 'ServiceQuotaExceededException'], ['shape' => 'ConflictException']]], 'CreateParticipantConnection' => ['name' => 'CreateParticipantConnection', 'http' => ['method' => 'POST', 'requestUri' => '/participant/connection'], 'input' => ['shape' => 'CreateParticipantConnectionRequest'], 'output' => ['shape' => 'CreateParticipantConnectionResponse'], 'errors' => [['shape' => 'AccessDeniedException'], ['shape' => 'InternalServerException'], ['shape' => 'ThrottlingException'], ['shape' => 'ValidationException']]], 'DisconnectParticipant' => ['name' => 'DisconnectParticipant', 'http' => ['method' => 'POST', 'requestUri' => '/participant/disconnect'], 'input' => ['shape' => 'DisconnectParticipantRequest'], 'output' => ['shape' => 'DisconnectParticipantResponse'], 'errors' => [['shape' => 'AccessDeniedException'], ['shape' => 'InternalServerException'], ['shape' => 'ThrottlingException'], ['shape' => 'ValidationException']]], 'GetAttachment' => ['name' => 'GetAttachment', 'http' => ['method' => 'POST', 'requestUri' => '/participant/attachment'], 'input' => ['shape' => 'GetAttachmentRequest'], 'output' => ['shape' => 'GetAttachmentResponse'], 'errors' => [['shape' => 'AccessDeniedException'], ['shape' => 'InternalServerException'], ['shape' => 'ThrottlingException'], ['shape' => 'ValidationException']]], 'GetTranscript' => ['name' => 'GetTranscript', 'http' => ['method' => 'POST', 'requestUri' => '/participant/transcript'], 'input' => ['shape' => 'GetTranscriptRequest'], 'output' => ['shape' => 'GetTranscriptResponse'], 'errors' => [['shape' => 'AccessDeniedException'], ['shape' => 'InternalServerException'], ['shape' => 'ThrottlingException'], ['shape' => 'ValidationException']]], 'SendEvent' => ['name' => 'SendEvent', 'http' => ['method' => 'POST', 'requestUri' => '/participant/event'], 'input' => ['shape' => 'SendEventRequest'], 'output' => ['shape' => 'SendEventResponse'], 'errors' => [['shape' => 'AccessDeniedException'], ['shape' => 'InternalServerException'], ['shape' => 'ThrottlingException'], ['shape' => 'ValidationException']]], 'SendMessage' => ['name' => 'SendMessage', 'http' => ['method' => 'POST', 'requestUri' => '/participant/message'], 'input' => ['shape' => 'SendMessageRequest'], 'output' => ['shape' => 'SendMessageResponse'], 'errors' => [['shape' => 'AccessDeniedException'], ['shape' => 'InternalServerException'], ['shape' => 'ThrottlingException'], ['shape' => 'ValidationException']]], 'StartAttachmentUpload' => ['name' => 'StartAttachmentUpload', 'http' => ['method' => 'POST', 'requestUri' => '/participant/start-attachment-upload'], 'input' => ['shape' => 'StartAttachmentUploadRequest'], 'output' => ['shape' => 'StartAttachmentUploadResponse'], 'errors' => [['shape' => 'AccessDeniedException'], ['shape' => 'InternalServerException'], ['shape' => 'ThrottlingException'], ['shape' => 'ValidationException'], ['shape' => 'ServiceQuotaExceededException']]]], 'shapes' => ['AccessDeniedException' => ['type' => 'structure', 'required' => ['Message'], 'members' => ['Message' => ['shape' => 'Message']], 'error' => ['httpStatusCode' => 403], 'exception' => \true], 'ArtifactId' => ['type' => 'string', 'max' => 256, 'min' => 1], 'ArtifactStatus' => ['type' => 'string', 'enum' => ['APPROVED', 'REJECTED', 'IN_PROGRESS']], 'AttachmentIdList' => ['type' => 'list', 'member' => ['shape' => 'ArtifactId'], 'max' => 1, 'min' => 1], 'AttachmentItem' => ['type' => 'structure', 'members' => ['ContentType' => ['shape' => 'ContentType'], 'AttachmentId' => ['shape' => 'ArtifactId'], 'AttachmentName' => ['shape' => 'AttachmentName'], 'Status' => ['shape' => 'ArtifactStatus']]], 'AttachmentName' => ['type' => 'string', 'max' => 256, 'min' => 1], 'AttachmentSizeInBytes' => ['type' => 'long', 'min' => 1], 'Attachments' => ['type' => 'list', 'member' => ['shape' => 'AttachmentItem']], 'Bool' => ['type' => 'boolean'], 'ChatContent' => ['type' => 'string', 'max' => 16384, 'min' => 1], 'ChatContentType' => ['type' => 'string', 'max' => 100, 'min' => 1], 'ChatItemId' => ['type' => 'string', 'max' => 256, 'min' => 1], 'ChatItemType' => ['type' => 'string', 'enum' => ['TYPING', 'PARTICIPANT_JOINED', 'PARTICIPANT_LEFT', 'CHAT_ENDED', 'TRANSFER_SUCCEEDED', 'TRANSFER_FAILED', 'MESSAGE', 'EVENT', 'ATTACHMENT', 'CONNECTION_ACK', 'MESSAGE_DELIVERED', 'MESSAGE_READ']], 'ClientToken' => ['type' => 'string', 'max' => 500], 'CompleteAttachmentUploadRequest' => ['type' => 'structure', 'required' => ['AttachmentIds', 'ClientToken', 'ConnectionToken'], 'members' => ['AttachmentIds' => ['shape' => 'AttachmentIdList'], 'ClientToken' => ['shape' => 'NonEmptyClientToken', 'idempotencyToken' => \true], 'ConnectionToken' => ['shape' => 'ParticipantToken', 'location' => 'header', 'locationName' => 'X-Amz-Bearer']]], 'CompleteAttachmentUploadResponse' => ['type' => 'structure', 'members' => []], 'ConflictException' => ['type' => 'structure', 'required' => ['Message'], 'members' => ['Message' => ['shape' => 'Reason']], 'error' => ['httpStatusCode' => 409], 'exception' => \true], 'ConnectionCredentials' => ['type' => 'structure', 'members' => ['ConnectionToken' => ['shape' => 'ParticipantToken'], 'Expiry' => ['shape' => 'ISO8601Datetime']]], 'ConnectionType' => ['type' => 'string', 'enum' => ['WEBSOCKET', 'CONNECTION_CREDENTIALS']], 'ConnectionTypeList' => ['type' => 'list', 'member' => ['shape' => 'ConnectionType'], 'min' => 1], 'ContactId' => ['type' => 'string', 'max' => 256, 'min' => 1], 'ContentType' => ['type' => 'string', 'max' => 255, 'min' => 1], 'CreateParticipantConnectionRequest' => ['type' => 'structure', 'required' => ['ParticipantToken'], 'members' => ['Type' => ['shape' => 'ConnectionTypeList'], 'ParticipantToken' => ['shape' => 'ParticipantToken', 'location' => 'header', 'locationName' => 'X-Amz-Bearer'], 'ConnectParticipant' => ['shape' => 'Bool']]], 'CreateParticipantConnectionResponse' => ['type' => 'structure', 'members' => ['Websocket' => ['shape' => 'Websocket'], 'ConnectionCredentials' => ['shape' => 'ConnectionCredentials']]], 'DisconnectParticipantRequest' => ['type' => 'structure', 'required' => ['ConnectionToken'], 'members' => ['ClientToken' => ['shape' => 'ClientToken', 'idempotencyToken' => \true], 'ConnectionToken' => ['shape' => 'ParticipantToken', 'location' => 'header', 'locationName' => 'X-Amz-Bearer']]], 'DisconnectParticipantResponse' => ['type' => 'structure', 'members' => []], 'DisplayName' => ['type' => 'string', 'max' => 256, 'min' => 1], 'GetAttachmentRequest' => ['type' => 'structure', 'required' => ['AttachmentId', 'ConnectionToken'], 'members' => ['AttachmentId' => ['shape' => 'ArtifactId'], 'ConnectionToken' => ['shape' => 'ParticipantToken', 'location' => 'header', 'locationName' => 'X-Amz-Bearer']]], 'GetAttachmentResponse' => ['type' => 'structure', 'members' => ['Url' => ['shape' => 'PreSignedAttachmentUrl'], 'UrlExpiry' => ['shape' => 'ISO8601Datetime']]], 'GetTranscriptRequest' => ['type' => 'structure', 'required' => ['ConnectionToken'], 'members' => ['ContactId' => ['shape' => 'ContactId'], 'MaxResults' => ['shape' => 'MaxResults', 'box' => \true], 'NextToken' => ['shape' => 'NextToken'], 'ScanDirection' => ['shape' => 'ScanDirection'], 'SortOrder' => ['shape' => 'SortKey'], 'StartPosition' => ['shape' => 'StartPosition'], 'ConnectionToken' => ['shape' => 'ParticipantToken', 'location' => 'header', 'locationName' => 'X-Amz-Bearer']]], 'GetTranscriptResponse' => ['type' => 'structure', 'members' => ['InitialContactId' => ['shape' => 'ContactId'], 'Transcript' => ['shape' => 'Transcript'], 'NextToken' => ['shape' => 'NextToken']]], 'ISO8601Datetime' => ['type' => 'string'], 'Instant' => ['type' => 'string', 'max' => 100, 'min' => 1], 'InternalServerException' => ['type' => 'structure', 'required' => ['Message'], 'members' => ['Message' => ['shape' => 'Message']], 'error' => ['httpStatusCode' => 500], 'exception' => \true, 'fault' => \true], 'Item' => ['type' => 'structure', 'members' => ['AbsoluteTime' => ['shape' => 'Instant'], 'Content' => ['shape' => 'ChatContent'], 'ContentType' => ['shape' => 'ChatContentType'], 'Id' => ['shape' => 'ChatItemId'], 'Type' => ['shape' => 'ChatItemType'], 'ParticipantId' => ['shape' => 'ParticipantId'], 'DisplayName' => ['shape' => 'DisplayName'], 'ParticipantRole' => ['shape' => 'ParticipantRole'], 'Attachments' => ['shape' => 'Attachments'], 'MessageMetadata' => ['shape' => 'MessageMetadata'], 'RelatedContactId' => ['shape' => 'ContactId'], 'ContactId' => ['shape' => 'ContactId']]], 'MaxResults' => ['type' => 'integer', 'max' => 100, 'min' => 0], 'Message' => ['type' => 'string'], 'MessageMetadata' => ['type' => 'structure', 'members' => ['MessageId' => ['shape' => 'ChatItemId'], 'Receipts' => ['shape' => 'Receipts']]], 'MostRecent' => ['type' => 'integer', 'max' => 100, 'min' => 0], 'NextToken' => ['type' => 'string', 'max' => 1000, 'min' => 1], 'NonEmptyClientToken' => ['type' => 'string', 'max' => 500, 'min' => 1], 'ParticipantId' => ['type' => 'string', 'max' => 256, 'min' => 1], 'ParticipantRole' => ['type' => 'string', 'enum' => ['AGENT', 'CUSTOMER', 'SYSTEM']], 'ParticipantToken' => ['type' => 'string', 'max' => 1000, 'min' => 1], 'PreSignedAttachmentUrl' => ['type' => 'string', 'max' => 2000, 'min' => 1], 'PreSignedConnectionUrl' => ['type' => 'string', 'max' => 2000, 'min' => 1], 'Reason' => ['type' => 'string', 'max' => 2000, 'min' => 1], 'Receipt' => ['type' => 'structure', 'members' => ['DeliveredTimestamp' => ['shape' => 'Instant'], 'ReadTimestamp' => ['shape' => 'Instant'], 'RecipientParticipantId' => ['shape' => 'ParticipantId']]], 'Receipts' => ['type' => 'list', 'member' => ['shape' => 'Receipt']], 'ScanDirection' => ['type' => 'string', 'enum' => ['FORWARD', 'BACKWARD']], 'SendEventRequest' => ['type' => 'structure', 'required' => ['ContentType', 'ConnectionToken'], 'members' => ['ContentType' => ['shape' => 'ChatContentType'], 'Content' => ['shape' => 'ChatContent'], 'ClientToken' => ['shape' => 'ClientToken', 'idempotencyToken' => \true], 'ConnectionToken' => ['shape' => 'ParticipantToken', 'location' => 'header', 'locationName' => 'X-Amz-Bearer']]], 'SendEventResponse' => ['type' => 'structure', 'members' => ['Id' => ['shape' => 'ChatItemId'], 'AbsoluteTime' => ['shape' => 'Instant']]], 'SendMessageRequest' => ['type' => 'structure', 'required' => ['ContentType', 'Content', 'ConnectionToken'], 'members' => ['ContentType' => ['shape' => 'ChatContentType'], 'Content' => ['shape' => 'ChatContent'], 'ClientToken' => ['shape' => 'ClientToken', 'idempotencyToken' => \true], 'ConnectionToken' => ['shape' => 'ParticipantToken', 'location' => 'header', 'locationName' => 'X-Amz-Bearer']]], 'SendMessageResponse' => ['type' => 'structure', 'members' => ['Id' => ['shape' => 'ChatItemId'], 'AbsoluteTime' => ['shape' => 'Instant']]], 'ServiceQuotaExceededException' => ['type' => 'structure', 'required' => ['Message'], 'members' => ['Message' => ['shape' => 'Message']], 'error' => ['httpStatusCode' => 402], 'exception' => \true], 'SortKey' => ['type' => 'string', 'enum' => ['DESCENDING', 'ASCENDING']], 'StartAttachmentUploadRequest' => ['type' => 'structure', 'required' => ['ContentType', 'AttachmentSizeInBytes', 'AttachmentName', 'ClientToken', 'ConnectionToken'], 'members' => ['ContentType' => ['shape' => 'ContentType'], 'AttachmentSizeInBytes' => ['shape' => 'AttachmentSizeInBytes'], 'AttachmentName' => ['shape' => 'AttachmentName'], 'ClientToken' => ['shape' => 'NonEmptyClientToken', 'idempotencyToken' => \true], 'ConnectionToken' => ['shape' => 'ParticipantToken', 'location' => 'header', 'locationName' => 'X-Amz-Bearer']]], 'StartAttachmentUploadResponse' => ['type' => 'structure', 'members' => ['AttachmentId' => ['shape' => 'ArtifactId'], 'UploadMetadata' => ['shape' => 'UploadMetadata']]], 'StartPosition' => ['type' => 'structure', 'members' => ['Id' => ['shape' => 'ChatItemId'], 'AbsoluteTime' => ['shape' => 'Instant'], 'MostRecent' => ['shape' => 'MostRecent']]], 'ThrottlingException' => ['type' => 'structure', 'required' => ['Message'], 'members' => ['Message' => ['shape' => 'Message']], 'error' => ['httpStatusCode' => 429], 'exception' => \true], 'Transcript' => ['type' => 'list', 'member' => ['shape' => 'Item']], 'UploadMetadata' => ['type' => 'structure', 'members' => ['Url' => ['shape' => 'UploadMetadataUrl'], 'UrlExpiry' => ['shape' => 'ISO8601Datetime'], 'HeadersToInclude' => ['shape' => 'UploadMetadataSignedHeaders']]], 'UploadMetadataSignedHeaders' => ['type' => 'map', 'key' => ['shape' => 'UploadMetadataSignedHeadersKey'], 'value' => ['shape' => 'UploadMetadataSignedHeadersValue']], 'UploadMetadataSignedHeadersKey' => ['type' => 'string', 'max' => 128, 'min' => 1], 'UploadMetadataSignedHeadersValue' => ['type' => 'string', 'max' => 256, 'min' => 1], 'UploadMetadataUrl' => ['type' => 'string', 'max' => 2000, 'min' => 1], 'ValidationException' => ['type' => 'structure', 'required' => ['Message'], 'members' => ['Message' => ['shape' => 'Reason']], 'error' => ['httpStatusCode' => 400], 'exception' => \true], 'Websocket' => ['type' => 'structure', 'members' => ['Url' => ['shape' => 'PreSignedConnectionUrl'], 'ConnectionExpiry' => ['shape' => 'ISO8601Datetime']]]]];
