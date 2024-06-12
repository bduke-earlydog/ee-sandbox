<?php

namespace ExpressionEngine\Dependency\Aws\SSMContacts;

use ExpressionEngine\Dependency\Aws\AwsClient;
/**
 * This client is used to interact with the **AWS Systems Manager Incident Manager Contacts** service.
 * @method \Aws\Result acceptPage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptPageAsync(array $args = [])
 * @method \Aws\Result activateContactChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise activateContactChannelAsync(array $args = [])
 * @method \Aws\Result createContact(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createContactAsync(array $args = [])
 * @method \Aws\Result createContactChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createContactChannelAsync(array $args = [])
 * @method \Aws\Result createRotation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createRotationAsync(array $args = [])
 * @method \Aws\Result createRotationOverride(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createRotationOverrideAsync(array $args = [])
 * @method \Aws\Result deactivateContactChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deactivateContactChannelAsync(array $args = [])
 * @method \Aws\Result deleteContact(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContactAsync(array $args = [])
 * @method \Aws\Result deleteContactChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContactChannelAsync(array $args = [])
 * @method \Aws\Result deleteRotation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRotationAsync(array $args = [])
 * @method \Aws\Result deleteRotationOverride(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRotationOverrideAsync(array $args = [])
 * @method \Aws\Result describeEngagement(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEngagementAsync(array $args = [])
 * @method \Aws\Result describePage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describePageAsync(array $args = [])
 * @method \Aws\Result getContact(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getContactAsync(array $args = [])
 * @method \Aws\Result getContactChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getContactChannelAsync(array $args = [])
 * @method \Aws\Result getContactPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getContactPolicyAsync(array $args = [])
 * @method \Aws\Result getRotation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getRotationAsync(array $args = [])
 * @method \Aws\Result getRotationOverride(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getRotationOverrideAsync(array $args = [])
 * @method \Aws\Result listContactChannels(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listContactChannelsAsync(array $args = [])
 * @method \Aws\Result listContacts(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listContactsAsync(array $args = [])
 * @method \Aws\Result listEngagements(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEngagementsAsync(array $args = [])
 * @method \Aws\Result listPageReceipts(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPageReceiptsAsync(array $args = [])
 * @method \Aws\Result listPageResolutions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPageResolutionsAsync(array $args = [])
 * @method \Aws\Result listPagesByContact(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPagesByContactAsync(array $args = [])
 * @method \Aws\Result listPagesByEngagement(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPagesByEngagementAsync(array $args = [])
 * @method \Aws\Result listPreviewRotationShifts(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPreviewRotationShiftsAsync(array $args = [])
 * @method \Aws\Result listRotationOverrides(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listRotationOverridesAsync(array $args = [])
 * @method \Aws\Result listRotationShifts(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listRotationShiftsAsync(array $args = [])
 * @method \Aws\Result listRotations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listRotationsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result putContactPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putContactPolicyAsync(array $args = [])
 * @method \Aws\Result sendActivationCode(array $args = [])
 * @method \GuzzleHttp\Promise\Promise sendActivationCodeAsync(array $args = [])
 * @method \Aws\Result startEngagement(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startEngagementAsync(array $args = [])
 * @method \Aws\Result stopEngagement(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopEngagementAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateContact(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactAsync(array $args = [])
 * @method \Aws\Result updateContactChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactChannelAsync(array $args = [])
 * @method \Aws\Result updateRotation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRotationAsync(array $args = [])
 */
class SSMContactsClient extends AwsClient
{
}