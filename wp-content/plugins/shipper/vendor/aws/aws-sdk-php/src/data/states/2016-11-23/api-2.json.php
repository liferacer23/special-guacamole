<?php
// This file was auto-generated from sdk-root/src/data/states/2016-11-23/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2016-11-23', 'endpointPrefix' => 'states', 'jsonVersion' => '1.0', 'protocol' => 'json', 'serviceAbbreviation' => 'AWS SFN', 'serviceFullName' => 'AWS Step Functions', 'serviceId' => 'SFN', 'signatureVersion' => 'v4', 'targetPrefix' => 'AWSStepFunctions', 'uid' => 'states-2016-11-23', ], 'operations' => [ 'CreateActivity' => [ 'name' => 'CreateActivity', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateActivityInput', ], 'output' => [ 'shape' => 'CreateActivityOutput', ], 'errors' => [ [ 'shape' => 'ActivityLimitExceeded', ], [ 'shape' => 'InvalidName', ], [ 'shape' => 'TooManyTags', ], ], 'idempotent' => true, ], 'CreateStateMachine' => [ 'name' => 'CreateStateMachine', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateStateMachineInput', ], 'output' => [ 'shape' => 'CreateStateMachineOutput', ], 'errors' => [ [ 'shape' => 'InvalidArn', ], [ 'shape' => 'InvalidDefinition', ], [ 'shape' => 'InvalidName', ], [ 'shape' => 'InvalidLoggingConfiguration', ], [ 'shape' => 'InvalidTracingConfiguration', ], [ 'shape' => 'StateMachineAlreadyExists', ], [ 'shape' => 'StateMachineDeleting', ], [ 'shape' => 'StateMachineLimitExceeded', ], [ 'shape' => 'StateMachineTypeNotSupported', ], [ 'shape' => 'TooManyTags', ], ], 'idempotent' => true, ], 'DeleteActivity' => [ 'name' => 'DeleteActivity', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteActivityInput', ], 'output' => [ 'shape' => 'DeleteActivityOutput', ], 'errors' => [ [ 'shape' => 'InvalidArn', ], ], ], 'DeleteStateMachine' => [ 'name' => 'DeleteStateMachine', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteStateMachineInput', ], 'output' => [ 'shape' => 'DeleteStateMachineOutput', ], 'errors' => [ [ 'shape' => 'InvalidArn', ], ], ], 'DescribeActivity' => [ 'name' => 'DescribeActivity', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeActivityInput', ], 'output' => [ 'shape' => 'DescribeActivityOutput', ], 'errors' => [ [ 'shape' => 'ActivityDoesNotExist', ], [ 'shape' => 'InvalidArn', ], ], ], 'DescribeExecution' => [ 'name' => 'DescribeExecution', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeExecutionInput', ], 'output' => [ 'shape' => 'DescribeExecutionOutput', ], 'errors' => [ [ 'shape' => 'ExecutionDoesNotExist', ], [ 'shape' => 'InvalidArn', ], ], ], 'DescribeStateMachine' => [ 'name' => 'DescribeStateMachine', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeStateMachineInput', ], 'output' => [ 'shape' => 'DescribeStateMachineOutput', ], 'errors' => [ [ 'shape' => 'InvalidArn', ], [ 'shape' => 'StateMachineDoesNotExist', ], ], ], 'DescribeStateMachineForExecution' => [ 'name' => 'DescribeStateMachineForExecution', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeStateMachineForExecutionInput', ], 'output' => [ 'shape' => 'DescribeStateMachineForExecutionOutput', ], 'errors' => [ [ 'shape' => 'ExecutionDoesNotExist', ], [ 'shape' => 'InvalidArn', ], ], ], 'GetActivityTask' => [ 'name' => 'GetActivityTask', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetActivityTaskInput', ], 'output' => [ 'shape' => 'GetActivityTaskOutput', ], 'errors' => [ [ 'shape' => 'ActivityDoesNotExist', ], [ 'shape' => 'ActivityWorkerLimitExceeded', ], [ 'shape' => 'InvalidArn', ], ], ], 'GetExecutionHistory' => [ 'name' => 'GetExecutionHistory', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetExecutionHistoryInput', ], 'output' => [ 'shape' => 'GetExecutionHistoryOutput', ], 'errors' => [ [ 'shape' => 'ExecutionDoesNotExist', ], [ 'shape' => 'InvalidArn', ], [ 'shape' => 'InvalidToken', ], ], ], 'ListActivities' => [ 'name' => 'ListActivities', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListActivitiesInput', ], 'output' => [ 'shape' => 'ListActivitiesOutput', ], 'errors' => [ [ 'shape' => 'InvalidToken', ], ], ], 'ListExecutions' => [ 'name' => 'ListExecutions', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListExecutionsInput', ], 'output' => [ 'shape' => 'ListExecutionsOutput', ], 'errors' => [ [ 'shape' => 'InvalidArn', ], [ 'shape' => 'InvalidToken', ], [ 'shape' => 'StateMachineDoesNotExist', ], [ 'shape' => 'StateMachineTypeNotSupported', ], ], ], 'ListStateMachines' => [ 'name' => 'ListStateMachines', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListStateMachinesInput', ], 'output' => [ 'shape' => 'ListStateMachinesOutput', ], 'errors' => [ [ 'shape' => 'InvalidToken', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListTagsForResourceInput', ], 'output' => [ 'shape' => 'ListTagsForResourceOutput', ], 'errors' => [ [ 'shape' => 'InvalidArn', ], [ 'shape' => 'ResourceNotFound', ], ], ], 'SendTaskFailure' => [ 'name' => 'SendTaskFailure', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'SendTaskFailureInput', ], 'output' => [ 'shape' => 'SendTaskFailureOutput', ], 'errors' => [ [ 'shape' => 'TaskDoesNotExist', ], [ 'shape' => 'InvalidToken', ], [ 'shape' => 'TaskTimedOut', ], ], ], 'SendTaskHeartbeat' => [ 'name' => 'SendTaskHeartbeat', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'SendTaskHeartbeatInput', ], 'output' => [ 'shape' => 'SendTaskHeartbeatOutput', ], 'errors' => [ [ 'shape' => 'TaskDoesNotExist', ], [ 'shape' => 'InvalidToken', ], [ 'shape' => 'TaskTimedOut', ], ], ], 'SendTaskSuccess' => [ 'name' => 'SendTaskSuccess', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'SendTaskSuccessInput', ], 'output' => [ 'shape' => 'SendTaskSuccessOutput', ], 'errors' => [ [ 'shape' => 'TaskDoesNotExist', ], [ 'shape' => 'InvalidOutput', ], [ 'shape' => 'InvalidToken', ], [ 'shape' => 'TaskTimedOut', ], ], ], 'StartExecution' => [ 'name' => 'StartExecution', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'StartExecutionInput', ], 'output' => [ 'shape' => 'StartExecutionOutput', ], 'errors' => [ [ 'shape' => 'ExecutionLimitExceeded', ], [ 'shape' => 'ExecutionAlreadyExists', ], [ 'shape' => 'InvalidArn', ], [ 'shape' => 'InvalidExecutionInput', ], [ 'shape' => 'InvalidName', ], [ 'shape' => 'StateMachineDoesNotExist', ], [ 'shape' => 'StateMachineDeleting', ], ], 'idempotent' => true, ], 'StartSyncExecution' => [ 'name' => 'StartSyncExecution', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'StartSyncExecutionInput', ], 'output' => [ 'shape' => 'StartSyncExecutionOutput', ], 'errors' => [ [ 'shape' => 'InvalidArn', ], [ 'shape' => 'InvalidExecutionInput', ], [ 'shape' => 'InvalidName', ], [ 'shape' => 'StateMachineDoesNotExist', ], [ 'shape' => 'StateMachineDeleting', ], [ 'shape' => 'StateMachineTypeNotSupported', ], ], 'endpoint' => [ 'hostPrefix' => 'sync-', ], ], 'StopExecution' => [ 'name' => 'StopExecution', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'StopExecutionInput', ], 'output' => [ 'shape' => 'StopExecutionOutput', ], 'errors' => [ [ 'shape' => 'ExecutionDoesNotExist', ], [ 'shape' => 'InvalidArn', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'TagResourceInput', ], 'output' => [ 'shape' => 'TagResourceOutput', ], 'errors' => [ [ 'shape' => 'InvalidArn', ], [ 'shape' => 'ResourceNotFound', ], [ 'shape' => 'TooManyTags', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UntagResourceInput', ], 'output' => [ 'shape' => 'UntagResourceOutput', ], 'errors' => [ [ 'shape' => 'InvalidArn', ], [ 'shape' => 'ResourceNotFound', ], ], ], 'UpdateStateMachine' => [ 'name' => 'UpdateStateMachine', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateStateMachineInput', ], 'output' => [ 'shape' => 'UpdateStateMachineOutput', ], 'errors' => [ [ 'shape' => 'InvalidArn', ], [ 'shape' => 'InvalidDefinition', ], [ 'shape' => 'InvalidLoggingConfiguration', ], [ 'shape' => 'InvalidTracingConfiguration', ], [ 'shape' => 'MissingRequiredParameter', ], [ 'shape' => 'StateMachineDeleting', ], [ 'shape' => 'StateMachineDoesNotExist', ], ], 'idempotent' => true, ], ], 'shapes' => [ 'ActivityDoesNotExist' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'ActivityFailedEventDetails' => [ 'type' => 'structure', 'members' => [ 'error' => [ 'shape' => 'SensitiveError', ], 'cause' => [ 'shape' => 'SensitiveCause', ], ], ], 'ActivityLimitExceeded' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'ActivityList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ActivityListItem', ], ], 'ActivityListItem' => [ 'type' => 'structure', 'required' => [ 'activityArn', 'name', 'creationDate', ], 'members' => [ 'activityArn' => [ 'shape' => 'Arn', ], 'name' => [ 'shape' => 'Name', ], 'creationDate' => [ 'shape' => 'Timestamp', ], ], ], 'ActivityScheduleFailedEventDetails' => [ 'type' => 'structure', 'members' => [ 'error' => [ 'shape' => 'SensitiveError', ], 'cause' => [ 'shape' => 'SensitiveCause', ], ], ], 'ActivityScheduledEventDetails' => [ 'type' => 'structure', 'required' => [ 'resource', ], 'members' => [ 'resource' => [ 'shape' => 'Arn', ], 'input' => [ 'shape' => 'SensitiveData', ], 'inputDetails' => [ 'shape' => 'HistoryEventExecutionDataDetails', ], 'timeoutInSeconds' => [ 'shape' => 'TimeoutInSeconds', 'box' => true, ], 'heartbeatInSeconds' => [ 'shape' => 'TimeoutInSeconds', 'box' => true, ], ], ], 'ActivityStartedEventDetails' => [ 'type' => 'structure', 'members' => [ 'workerName' => [ 'shape' => 'Identity', ], ], ], 'ActivitySucceededEventDetails' => [ 'type' => 'structure', 'members' => [ 'output' => [ 'shape' => 'SensitiveData', ], 'outputDetails' => [ 'shape' => 'HistoryEventExecutionDataDetails', ], ], ], 'ActivityTimedOutEventDetails' => [ 'type' => 'structure', 'members' => [ 'error' => [ 'shape' => 'SensitiveError', ], 'cause' => [ 'shape' => 'SensitiveCause', ], ], ], 'ActivityWorkerLimitExceeded' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'Arn' => [ 'type' => 'string', 'max' => 256, 'min' => 1, ], 'BilledDuration' => [ 'type' => 'long', 'min' => 0, ], 'BilledMemoryUsed' => [ 'type' => 'long', 'min' => 0, ], 'BillingDetails' => [ 'type' => 'structure', 'members' => [ 'billedMemoryUsedInMB' => [ 'shape' => 'BilledMemoryUsed', ], 'billedDurationInMilliseconds' => [ 'shape' => 'BilledDuration', ], ], ], 'CloudWatchEventsExecutionDataDetails' => [ 'type' => 'structure', 'members' => [ 'included' => [ 'shape' => 'includedDetails', ], ], ], 'CloudWatchLogsLogGroup' => [ 'type' => 'structure', 'members' => [ 'logGroupArn' => [ 'shape' => 'Arn', ], ], ], 'ConnectorParameters' => [ 'type' => 'string', 'max' => 262144, 'min' => 0, 'sensitive' => true, ], 'CreateActivityInput' => [ 'type' => 'structure', 'required' => [ 'name', ], 'members' => [ 'name' => [ 'shape' => 'Name', ], 'tags' => [ 'shape' => 'TagList', ], ], ], 'CreateActivityOutput' => [ 'type' => 'structure', 'required' => [ 'activityArn', 'creationDate', ], 'members' => [ 'activityArn' => [ 'shape' => 'Arn', ], 'creationDate' => [ 'shape' => 'Timestamp', ], ], ], 'CreateStateMachineInput' => [ 'type' => 'structure', 'required' => [ 'name', 'definition', 'roleArn', ], 'members' => [ 'name' => [ 'shape' => 'Name', ], 'definition' => [ 'shape' => 'Definition', ], 'roleArn' => [ 'shape' => 'Arn', ], 'type' => [ 'shape' => 'StateMachineType', ], 'loggingConfiguration' => [ 'shape' => 'LoggingConfiguration', ], 'tags' => [ 'shape' => 'TagList', ], 'tracingConfiguration' => [ 'shape' => 'TracingConfiguration', ], ], ], 'CreateStateMachineOutput' => [ 'type' => 'structure', 'required' => [ 'stateMachineArn', 'creationDate', ], 'members' => [ 'stateMachineArn' => [ 'shape' => 'Arn', ], 'creationDate' => [ 'shape' => 'Timestamp', ], ], ], 'Definition' => [ 'type' => 'string', 'max' => 1048576, 'min' => 1, 'sensitive' => true, ], 'DeleteActivityInput' => [ 'type' => 'structure', 'required' => [ 'activityArn', ], 'members' => [ 'activityArn' => [ 'shape' => 'Arn', ], ], ], 'DeleteActivityOutput' => [ 'type' => 'structure', 'members' => [], ], 'DeleteStateMachineInput' => [ 'type' => 'structure', 'required' => [ 'stateMachineArn', ], 'members' => [ 'stateMachineArn' => [ 'shape' => 'Arn', ], ], ], 'DeleteStateMachineOutput' => [ 'type' => 'structure', 'members' => [], ], 'DescribeActivityInput' => [ 'type' => 'structure', 'required' => [ 'activityArn', ], 'members' => [ 'activityArn' => [ 'shape' => 'Arn', ], ], ], 'DescribeActivityOutput' => [ 'type' => 'structure', 'required' => [ 'activityArn', 'name', 'creationDate', ], 'members' => [ 'activityArn' => [ 'shape' => 'Arn', ], 'name' => [ 'shape' => 'Name', ], 'creationDate' => [ 'shape' => 'Timestamp', ], ], ], 'DescribeExecutionInput' => [ 'type' => 'structure', 'required' => [ 'executionArn', ], 'members' => [ 'executionArn' => [ 'shape' => 'Arn', ], ], ], 'DescribeExecutionOutput' => [ 'type' => 'structure', 'required' => [ 'executionArn', 'stateMachineArn', 'status', 'startDate', ], 'members' => [ 'executionArn' => [ 'shape' => 'Arn', ], 'stateMachineArn' => [ 'shape' => 'Arn', ], 'name' => [ 'shape' => 'Name', ], 'status' => [ 'shape' => 'ExecutionStatus', ], 'startDate' => [ 'shape' => 'Timestamp', ], 'stopDate' => [ 'shape' => 'Timestamp', ], 'input' => [ 'shape' => 'SensitiveData', ], 'inputDetails' => [ 'shape' => 'CloudWatchEventsExecutionDataDetails', ], 'output' => [ 'shape' => 'SensitiveData', ], 'outputDetails' => [ 'shape' => 'CloudWatchEventsExecutionDataDetails', ], 'traceHeader' => [ 'shape' => 'TraceHeader', ], ], ], 'DescribeStateMachineForExecutionInput' => [ 'type' => 'structure', 'required' => [ 'executionArn', ], 'members' => [ 'executionArn' => [ 'shape' => 'Arn', ], ], ], 'DescribeStateMachineForExecutionOutput' => [ 'type' => 'structure', 'required' => [ 'stateMachineArn', 'name', 'definition', 'roleArn', 'updateDate', ], 'members' => [ 'stateMachineArn' => [ 'shape' => 'Arn', ], 'name' => [ 'shape' => 'Name', ], 'definition' => [ 'shape' => 'Definition', ], 'roleArn' => [ 'shape' => 'Arn', ], 'updateDate' => [ 'shape' => 'Timestamp', ], 'loggingConfiguration' => [ 'shape' => 'LoggingConfiguration', ], 'tracingConfiguration' => [ 'shape' => 'TracingConfiguration', ], ], ], 'DescribeStateMachineInput' => [ 'type' => 'structure', 'required' => [ 'stateMachineArn', ], 'members' => [ 'stateMachineArn' => [ 'shape' => 'Arn', ], ], ], 'DescribeStateMachineOutput' => [ 'type' => 'structure', 'required' => [ 'stateMachineArn', 'name', 'definition', 'roleArn', 'type', 'creationDate', ], 'members' => [ 'stateMachineArn' => [ 'shape' => 'Arn', ], 'name' => [ 'shape' => 'Name', ], 'status' => [ 'shape' => 'StateMachineStatus', ], 'definition' => [ 'shape' => 'Definition', ], 'roleArn' => [ 'shape' => 'Arn', ], 'type' => [ 'shape' => 'StateMachineType', ], 'creationDate' => [ 'shape' => 'Timestamp', ], 'loggingConfiguration' => [ 'shape' => 'LoggingConfiguration', ], 'tracingConfiguration' => [ 'shape' => 'TracingConfiguration', ], ], ], 'Enabled' => [ 'type' => 'boolean', ], 'ErrorMessage' => [ 'type' => 'string', ], 'EventId' => [ 'type' => 'long', ], 'ExecutionAbortedEventDetails' => [ 'type' => 'structure', 'members' => [ 'error' => [ 'shape' => 'SensitiveError', ], 'cause' => [ 'shape' => 'SensitiveCause', ], ], ], 'ExecutionAlreadyExists' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'ExecutionDoesNotExist' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'ExecutionFailedEventDetails' => [ 'type' => 'structure', 'members' => [ 'error' => [ 'shape' => 'SensitiveError', ], 'cause' => [ 'shape' => 'SensitiveCause', ], ], ], 'ExecutionLimitExceeded' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'ExecutionList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ExecutionListItem', ], ], 'ExecutionListItem' => [ 'type' => 'structure', 'required' => [ 'executionArn', 'stateMachineArn', 'name', 'status', 'startDate', ], 'members' => [ 'executionArn' => [ 'shape' => 'Arn', ], 'stateMachineArn' => [ 'shape' => 'Arn', ], 'name' => [ 'shape' => 'Name', ], 'status' => [ 'shape' => 'ExecutionStatus', ], 'startDate' => [ 'shape' => 'Timestamp', ], 'stopDate' => [ 'shape' => 'Timestamp', ], ], ], 'ExecutionStartedEventDetails' => [ 'type' => 'structure', 'members' => [ 'input' => [ 'shape' => 'SensitiveData', ], 'inputDetails' => [ 'shape' => 'HistoryEventExecutionDataDetails', ], 'roleArn' => [ 'shape' => 'Arn', ], ], ], 'ExecutionStatus' => [ 'type' => 'string', 'enum' => [ 'RUNNING', 'SUCCEEDED', 'FAILED', 'TIMED_OUT', 'ABORTED', ], ], 'ExecutionSucceededEventDetails' => [ 'type' => 'structure', 'members' => [ 'output' => [ 'shape' => 'SensitiveData', ], 'outputDetails' => [ 'shape' => 'HistoryEventExecutionDataDetails', ], ], ], 'ExecutionTimedOutEventDetails' => [ 'type' => 'structure', 'members' => [ 'error' => [ 'shape' => 'SensitiveError', ], 'cause' => [ 'shape' => 'SensitiveCause', ], ], ], 'GetActivityTaskInput' => [ 'type' => 'structure', 'required' => [ 'activityArn', ], 'members' => [ 'activityArn' => [ 'shape' => 'Arn', ], 'workerName' => [ 'shape' => 'Name', ], ], ], 'GetActivityTaskOutput' => [ 'type' => 'structure', 'members' => [ 'taskToken' => [ 'shape' => 'TaskToken', ], 'input' => [ 'shape' => 'SensitiveDataJobInput', ], ], ], 'GetExecutionHistoryInput' => [ 'type' => 'structure', 'required' => [ 'executionArn', ], 'members' => [ 'executionArn' => [ 'shape' => 'Arn', ], 'maxResults' => [ 'shape' => 'PageSize', ], 'reverseOrder' => [ 'shape' => 'ReverseOrder', ], 'nextToken' => [ 'shape' => 'PageToken', ], 'includeExecutionData' => [ 'shape' => 'IncludeExecutionDataGetExecutionHistory', ], ], ], 'GetExecutionHistoryOutput' => [ 'type' => 'structure', 'required' => [ 'events', ], 'members' => [ 'events' => [ 'shape' => 'HistoryEventList', ], 'nextToken' => [ 'shape' => 'PageToken', ], ], ], 'HistoryEvent' => [ 'type' => 'structure', 'required' => [ 'timestamp', 'type', 'id', ], 'members' => [ 'timestamp' => [ 'shape' => 'Timestamp', ], 'type' => [ 'shape' => 'HistoryEventType', ], 'id' => [ 'shape' => 'EventId', ], 'previousEventId' => [ 'shape' => 'EventId', ], 'activityFailedEventDetails' => [ 'shape' => 'ActivityFailedEventDetails', ], 'activityScheduleFailedEventDetails' => [ 'shape' => 'ActivityScheduleFailedEventDetails', ], 'activityScheduledEventDetails' => [ 'shape' => 'ActivityScheduledEventDetails', ], 'activityStartedEventDetails' => [ 'shape' => 'ActivityStartedEventDetails', ], 'activitySucceededEventDetails' => [ 'shape' => 'ActivitySucceededEventDetails', ], 'activityTimedOutEventDetails' => [ 'shape' => 'ActivityTimedOutEventDetails', ], 'taskFailedEventDetails' => [ 'shape' => 'TaskFailedEventDetails', ], 'taskScheduledEventDetails' => [ 'shape' => 'TaskScheduledEventDetails', ], 'taskStartFailedEventDetails' => [ 'shape' => 'TaskStartFailedEventDetails', ], 'taskStartedEventDetails' => [ 'shape' => 'TaskStartedEventDetails', ], 'taskSubmitFailedEventDetails' => [ 'shape' => 'TaskSubmitFailedEventDetails', ], 'taskSubmittedEventDetails' => [ 'shape' => 'TaskSubmittedEventDetails', ], 'taskSucceededEventDetails' => [ 'shape' => 'TaskSucceededEventDetails', ], 'taskTimedOutEventDetails' => [ 'shape' => 'TaskTimedOutEventDetails', ], 'executionFailedEventDetails' => [ 'shape' => 'ExecutionFailedEventDetails', ], 'executionStartedEventDetails' => [ 'shape' => 'ExecutionStartedEventDetails', ], 'executionSucceededEventDetails' => [ 'shape' => 'ExecutionSucceededEventDetails', ], 'executionAbortedEventDetails' => [ 'shape' => 'ExecutionAbortedEventDetails', ], 'executionTimedOutEventDetails' => [ 'shape' => 'ExecutionTimedOutEventDetails', ], 'mapStateStartedEventDetails' => [ 'shape' => 'MapStateStartedEventDetails', ], 'mapIterationStartedEventDetails' => [ 'shape' => 'MapIterationEventDetails', ], 'mapIterationSucceededEventDetails' => [ 'shape' => 'MapIterationEventDetails', ], 'mapIterationFailedEventDetails' => [ 'shape' => 'MapIterationEventDetails', ], 'mapIterationAbortedEventDetails' => [ 'shape' => 'MapIterationEventDetails', ], 'lambdaFunctionFailedEventDetails' => [ 'shape' => 'LambdaFunctionFailedEventDetails', ], 'lambdaFunctionScheduleFailedEventDetails' => [ 'shape' => 'LambdaFunctionScheduleFailedEventDetails', ], 'lambdaFunctionScheduledEventDetails' => [ 'shape' => 'LambdaFunctionScheduledEventDetails', ], 'lambdaFunctionStartFailedEventDetails' => [ 'shape' => 'LambdaFunctionStartFailedEventDetails', ], 'lambdaFunctionSucceededEventDetails' => [ 'shape' => 'LambdaFunctionSucceededEventDetails', ], 'lambdaFunctionTimedOutEventDetails' => [ 'shape' => 'LambdaFunctionTimedOutEventDetails', ], 'stateEnteredEventDetails' => [ 'shape' => 'StateEnteredEventDetails', ], 'stateExitedEventDetails' => [ 'shape' => 'StateExitedEventDetails', ], ], ], 'HistoryEventExecutionDataDetails' => [ 'type' => 'structure', 'members' => [ 'truncated' => [ 'shape' => 'truncated', ], ], ], 'HistoryEventList' => [ 'type' => 'list', 'member' => [ 'shape' => 'HistoryEvent', ], ], 'HistoryEventType' => [ 'type' => 'string', 'enum' => [ 'ActivityFailed', 'ActivityScheduled', 'ActivityScheduleFailed', 'ActivityStarted', 'ActivitySucceeded', 'ActivityTimedOut', 'ChoiceStateEntered', 'ChoiceStateExited', 'ExecutionAborted', 'ExecutionFailed', 'ExecutionStarted', 'ExecutionSucceeded', 'ExecutionTimedOut', 'FailStateEntered', 'LambdaFunctionFailed', 'LambdaFunctionScheduled', 'LambdaFunctionScheduleFailed', 'LambdaFunctionStarted', 'LambdaFunctionStartFailed', 'LambdaFunctionSucceeded', 'LambdaFunctionTimedOut', 'MapIterationAborted', 'MapIterationFailed', 'MapIterationStarted', 'MapIterationSucceeded', 'MapStateAborted', 'MapStateEntered', 'MapStateExited', 'MapStateFailed', 'MapStateStarted', 'MapStateSucceeded', 'ParallelStateAborted', 'ParallelStateEntered', 'ParallelStateExited', 'ParallelStateFailed', 'ParallelStateStarted', 'ParallelStateSucceeded', 'PassStateEntered', 'PassStateExited', 'SucceedStateEntered', 'SucceedStateExited', 'TaskFailed', 'TaskScheduled', 'TaskStarted', 'TaskStartFailed', 'TaskStateAborted', 'TaskStateEntered', 'TaskStateExited', 'TaskSubmitFailed', 'TaskSubmitted', 'TaskSucceeded', 'TaskTimedOut', 'WaitStateAborted', 'WaitStateEntered', 'WaitStateExited', ], ], 'Identity' => [ 'type' => 'string', 'max' => 256, ], 'IncludeExecutionData' => [ 'type' => 'boolean', ], 'IncludeExecutionDataGetExecutionHistory' => [ 'type' => 'boolean', 'box' => true, ], 'InvalidArn' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'InvalidDefinition' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'InvalidExecutionInput' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'InvalidLoggingConfiguration' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'InvalidName' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'InvalidOutput' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'InvalidToken' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'InvalidTracingConfiguration' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'LambdaFunctionFailedEventDetails' => [ 'type' => 'structure', 'members' => [ 'error' => [ 'shape' => 'SensitiveError', ], 'cause' => [ 'shape' => 'SensitiveCause', ], ], ], 'LambdaFunctionScheduleFailedEventDetails' => [ 'type' => 'structure', 'members' => [ 'error' => [ 'shape' => 'SensitiveError', ], 'cause' => [ 'shape' => 'SensitiveCause', ], ], ], 'LambdaFunctionScheduledEventDetails' => [ 'type' => 'structure', 'required' => [ 'resource', ], 'members' => [ 'resource' => [ 'shape' => 'Arn', ], 'input' => [ 'shape' => 'SensitiveData', ], 'inputDetails' => [ 'shape' => 'HistoryEventExecutionDataDetails', ], 'timeoutInSeconds' => [ 'shape' => 'TimeoutInSeconds', 'box' => true, ], ], ], 'LambdaFunctionStartFailedEventDetails' => [ 'type' => 'structure', 'members' => [ 'error' => [ 'shape' => 'SensitiveError', ], 'cause' => [ 'shape' => 'SensitiveCause', ], ], ], 'LambdaFunctionSucceededEventDetails' => [ 'type' => 'structure', 'members' => [ 'output' => [ 'shape' => 'SensitiveData', ], 'outputDetails' => [ 'shape' => 'HistoryEventExecutionDataDetails', ], ], ], 'LambdaFunctionTimedOutEventDetails' => [ 'type' => 'structure', 'members' => [ 'error' => [ 'shape' => 'SensitiveError', ], 'cause' => [ 'shape' => 'SensitiveCause', ], ], ], 'ListActivitiesInput' => [ 'type' => 'structure', 'members' => [ 'maxResults' => [ 'shape' => 'PageSize', ], 'nextToken' => [ 'shape' => 'PageToken', ], ], ], 'ListActivitiesOutput' => [ 'type' => 'structure', 'required' => [ 'activities', ], 'members' => [ 'activities' => [ 'shape' => 'ActivityList', ], 'nextToken' => [ 'shape' => 'PageToken', ], ], ], 'ListExecutionsInput' => [ 'type' => 'structure', 'required' => [ 'stateMachineArn', ], 'members' => [ 'stateMachineArn' => [ 'shape' => 'Arn', ], 'statusFilter' => [ 'shape' => 'ExecutionStatus', ], 'maxResults' => [ 'shape' => 'PageSize', ], 'nextToken' => [ 'shape' => 'ListExecutionsPageToken', ], ], ], 'ListExecutionsOutput' => [ 'type' => 'structure', 'required' => [ 'executions', ], 'members' => [ 'executions' => [ 'shape' => 'ExecutionList', ], 'nextToken' => [ 'shape' => 'ListExecutionsPageToken', ], ], ], 'ListExecutionsPageToken' => [ 'type' => 'string', 'max' => 3096, 'min' => 1, ], 'ListStateMachinesInput' => [ 'type' => 'structure', 'members' => [ 'maxResults' => [ 'shape' => 'PageSize', ], 'nextToken' => [ 'shape' => 'PageToken', ], ], ], 'ListStateMachinesOutput' => [ 'type' => 'structure', 'required' => [ 'stateMachines', ], 'members' => [ 'stateMachines' => [ 'shape' => 'StateMachineList', ], 'nextToken' => [ 'shape' => 'PageToken', ], ], ], 'ListTagsForResourceInput' => [ 'type' => 'structure', 'required' => [ 'resourceArn', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', ], ], ], 'ListTagsForResourceOutput' => [ 'type' => 'structure', 'members' => [ 'tags' => [ 'shape' => 'TagList', ], ], ], 'LogDestination' => [ 'type' => 'structure', 'members' => [ 'cloudWatchLogsLogGroup' => [ 'shape' => 'CloudWatchLogsLogGroup', ], ], ], 'LogDestinationList' => [ 'type' => 'list', 'member' => [ 'shape' => 'LogDestination', ], ], 'LogLevel' => [ 'type' => 'string', 'enum' => [ 'ALL', 'ERROR', 'FATAL', 'OFF', ], ], 'LoggingConfiguration' => [ 'type' => 'structure', 'members' => [ 'level' => [ 'shape' => 'LogLevel', ], 'includeExecutionData' => [ 'shape' => 'IncludeExecutionData', ], 'destinations' => [ 'shape' => 'LogDestinationList', ], ], ], 'MapIterationEventDetails' => [ 'type' => 'structure', 'members' => [ 'name' => [ 'shape' => 'Name', ], 'index' => [ 'shape' => 'UnsignedInteger', ], ], ], 'MapStateStartedEventDetails' => [ 'type' => 'structure', 'members' => [ 'length' => [ 'shape' => 'UnsignedInteger', ], ], ], 'MissingRequiredParameter' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'Name' => [ 'type' => 'string', 'max' => 80, 'min' => 1, ], 'PageSize' => [ 'type' => 'integer', 'max' => 1000, 'min' => 0, ], 'PageToken' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, ], 'ResourceNotFound' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], 'resourceName' => [ 'shape' => 'Arn', ], ], 'exception' => true, ], 'ReverseOrder' => [ 'type' => 'boolean', ], 'SendTaskFailureInput' => [ 'type' => 'structure', 'required' => [ 'taskToken', ], 'members' => [ 'taskToken' => [ 'shape' => 'TaskToken', ], 'error' => [ 'shape' => 'SensitiveError', ], 'cause' => [ 'shape' => 'SensitiveCause', ], ], ], 'SendTaskFailureOutput' => [ 'type' => 'structure', 'members' => [], ], 'SendTaskHeartbeatInput' => [ 'type' => 'structure', 'required' => [ 'taskToken', ], 'members' => [ 'taskToken' => [ 'shape' => 'TaskToken', ], ], ], 'SendTaskHeartbeatOutput' => [ 'type' => 'structure', 'members' => [], ], 'SendTaskSuccessInput' => [ 'type' => 'structure', 'required' => [ 'taskToken', 'output', ], 'members' => [ 'taskToken' => [ 'shape' => 'TaskToken', ], 'output' => [ 'shape' => 'SensitiveData', ], ], ], 'SendTaskSuccessOutput' => [ 'type' => 'structure', 'members' => [], ], 'SensitiveCause' => [ 'type' => 'string', 'max' => 32768, 'min' => 0, 'sensitive' => true, ], 'SensitiveData' => [ 'type' => 'string', 'max' => 262144, 'sensitive' => true, ], 'SensitiveDataJobInput' => [ 'type' => 'string', 'max' => 262144, 'sensitive' => true, ], 'SensitiveError' => [ 'type' => 'string', 'max' => 256, 'min' => 0, 'sensitive' => true, ], 'StartExecutionInput' => [ 'type' => 'structure', 'required' => [ 'stateMachineArn', ], 'members' => [ 'stateMachineArn' => [ 'shape' => 'Arn', ], 'name' => [ 'shape' => 'Name', ], 'input' => [ 'shape' => 'SensitiveData', ], 'traceHeader' => [ 'shape' => 'TraceHeader', ], ], ], 'StartExecutionOutput' => [ 'type' => 'structure', 'required' => [ 'executionArn', 'startDate', ], 'members' => [ 'executionArn' => [ 'shape' => 'Arn', ], 'startDate' => [ 'shape' => 'Timestamp', ], ], ], 'StartSyncExecutionInput' => [ 'type' => 'structure', 'required' => [ 'stateMachineArn', ], 'members' => [ 'stateMachineArn' => [ 'shape' => 'Arn', ], 'name' => [ 'shape' => 'Name', ], 'input' => [ 'shape' => 'SensitiveData', ], 'traceHeader' => [ 'shape' => 'TraceHeader', ], ], ], 'StartSyncExecutionOutput' => [ 'type' => 'structure', 'required' => [ 'executionArn', 'startDate', 'stopDate', 'status', ], 'members' => [ 'executionArn' => [ 'shape' => 'Arn', ], 'stateMachineArn' => [ 'shape' => 'Arn', ], 'name' => [ 'shape' => 'Name', ], 'startDate' => [ 'shape' => 'Timestamp', ], 'stopDate' => [ 'shape' => 'Timestamp', ], 'status' => [ 'shape' => 'SyncExecutionStatus', ], 'error' => [ 'shape' => 'SensitiveError', ], 'cause' => [ 'shape' => 'SensitiveCause', ], 'input' => [ 'shape' => 'SensitiveData', ], 'inputDetails' => [ 'shape' => 'CloudWatchEventsExecutionDataDetails', ], 'output' => [ 'shape' => 'SensitiveData', ], 'outputDetails' => [ 'shape' => 'CloudWatchEventsExecutionDataDetails', ], 'traceHeader' => [ 'shape' => 'TraceHeader', ], 'billingDetails' => [ 'shape' => 'BillingDetails', ], ], ], 'StateEnteredEventDetails' => [ 'type' => 'structure', 'required' => [ 'name', ], 'members' => [ 'name' => [ 'shape' => 'Name', ], 'input' => [ 'shape' => 'SensitiveData', ], 'inputDetails' => [ 'shape' => 'HistoryEventExecutionDataDetails', ], ], ], 'StateExitedEventDetails' => [ 'type' => 'structure', 'required' => [ 'name', ], 'members' => [ 'name' => [ 'shape' => 'Name', ], 'output' => [ 'shape' => 'SensitiveData', ], 'outputDetails' => [ 'shape' => 'HistoryEventExecutionDataDetails', ], ], ], 'StateMachineAlreadyExists' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'StateMachineDeleting' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'StateMachineDoesNotExist' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'StateMachineLimitExceeded' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'StateMachineList' => [ 'type' => 'list', 'member' => [ 'shape' => 'StateMachineListItem', ], ], 'StateMachineListItem' => [ 'type' => 'structure', 'required' => [ 'stateMachineArn', 'name', 'type', 'creationDate', ], 'members' => [ 'stateMachineArn' => [ 'shape' => 'Arn', ], 'name' => [ 'shape' => 'Name', ], 'type' => [ 'shape' => 'StateMachineType', ], 'creationDate' => [ 'shape' => 'Timestamp', ], ], ], 'StateMachineStatus' => [ 'type' => 'string', 'enum' => [ 'ACTIVE', 'DELETING', ], ], 'StateMachineType' => [ 'type' => 'string', 'enum' => [ 'STANDARD', 'EXPRESS', ], ], 'StateMachineTypeNotSupported' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'StopExecutionInput' => [ 'type' => 'structure', 'required' => [ 'executionArn', ], 'members' => [ 'executionArn' => [ 'shape' => 'Arn', ], 'error' => [ 'shape' => 'SensitiveError', ], 'cause' => [ 'shape' => 'SensitiveCause', ], ], ], 'StopExecutionOutput' => [ 'type' => 'structure', 'required' => [ 'stopDate', ], 'members' => [ 'stopDate' => [ 'shape' => 'Timestamp', ], ], ], 'SyncExecutionStatus' => [ 'type' => 'string', 'enum' => [ 'SUCCEEDED', 'FAILED', 'TIMED_OUT', ], ], 'Tag' => [ 'type' => 'structure', 'members' => [ 'key' => [ 'shape' => 'TagKey', ], 'value' => [ 'shape' => 'TagValue', ], ], ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, ], 'TagKeyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], ], 'TagList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], ], 'TagResourceInput' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tags', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', ], 'tags' => [ 'shape' => 'TagList', ], ], ], 'TagResourceOutput' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'min' => 0, ], 'TaskDoesNotExist' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'TaskFailedEventDetails' => [ 'type' => 'structure', 'required' => [ 'resourceType', 'resource', ], 'members' => [ 'resourceType' => [ 'shape' => 'Name', ], 'resource' => [ 'shape' => 'Name', ], 'error' => [ 'shape' => 'SensitiveError', ], 'cause' => [ 'shape' => 'SensitiveCause', ], ], ], 'TaskScheduledEventDetails' => [ 'type' => 'structure', 'required' => [ 'resourceType', 'resource', 'region', 'parameters', ], 'members' => [ 'resourceType' => [ 'shape' => 'Name', ], 'resource' => [ 'shape' => 'Name', ], 'region' => [ 'shape' => 'Name', ], 'parameters' => [ 'shape' => 'ConnectorParameters', ], 'timeoutInSeconds' => [ 'shape' => 'TimeoutInSeconds', 'box' => true, ], 'heartbeatInSeconds' => [ 'shape' => 'TimeoutInSeconds', 'box' => true, ], ], ], 'TaskStartFailedEventDetails' => [ 'type' => 'structure', 'required' => [ 'resourceType', 'resource', ], 'members' => [ 'resourceType' => [ 'shape' => 'Name', ], 'resource' => [ 'shape' => 'Name', ], 'error' => [ 'shape' => 'SensitiveError', ], 'cause' => [ 'shape' => 'SensitiveCause', ], ], ], 'TaskStartedEventDetails' => [ 'type' => 'structure', 'required' => [ 'resourceType', 'resource', ], 'members' => [ 'resourceType' => [ 'shape' => 'Name', ], 'resource' => [ 'shape' => 'Name', ], ], ], 'TaskSubmitFailedEventDetails' => [ 'type' => 'structure', 'required' => [ 'resourceType', 'resource', ], 'members' => [ 'resourceType' => [ 'shape' => 'Name', ], 'resource' => [ 'shape' => 'Name', ], 'error' => [ 'shape' => 'SensitiveError', ], 'cause' => [ 'shape' => 'SensitiveCause', ], ], ], 'TaskSubmittedEventDetails' => [ 'type' => 'structure', 'required' => [ 'resourceType', 'resource', ], 'members' => [ 'resourceType' => [ 'shape' => 'Name', ], 'resource' => [ 'shape' => 'Name', ], 'output' => [ 'shape' => 'SensitiveData', ], 'outputDetails' => [ 'shape' => 'HistoryEventExecutionDataDetails', ], ], ], 'TaskSucceededEventDetails' => [ 'type' => 'structure', 'required' => [ 'resourceType', 'resource', ], 'members' => [ 'resourceType' => [ 'shape' => 'Name', ], 'resource' => [ 'shape' => 'Name', ], 'output' => [ 'shape' => 'SensitiveData', ], 'outputDetails' => [ 'shape' => 'HistoryEventExecutionDataDetails', ], ], ], 'TaskTimedOut' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'TaskTimedOutEventDetails' => [ 'type' => 'structure', 'required' => [ 'resourceType', 'resource', ], 'members' => [ 'resourceType' => [ 'shape' => 'Name', ], 'resource' => [ 'shape' => 'Name', ], 'error' => [ 'shape' => 'SensitiveError', ], 'cause' => [ 'shape' => 'SensitiveCause', ], ], ], 'TaskToken' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, ], 'TimeoutInSeconds' => [ 'type' => 'long', ], 'Timestamp' => [ 'type' => 'timestamp', ], 'TooManyTags' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], 'resourceName' => [ 'shape' => 'Arn', ], ], 'exception' => true, ], 'TraceHeader' => [ 'type' => 'string', 'max' => 256, 'min' => 0, 'pattern' => '\\p{ASCII}*', ], 'TracingConfiguration' => [ 'type' => 'structure', 'members' => [ 'enabled' => [ 'shape' => 'Enabled', ], ], ], 'UnsignedInteger' => [ 'type' => 'integer', 'min' => 0, ], 'UntagResourceInput' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tagKeys', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', ], 'tagKeys' => [ 'shape' => 'TagKeyList', ], ], ], 'UntagResourceOutput' => [ 'type' => 'structure', 'members' => [], ], 'UpdateStateMachineInput' => [ 'type' => 'structure', 'required' => [ 'stateMachineArn', ], 'members' => [ 'stateMachineArn' => [ 'shape' => 'Arn', ], 'definition' => [ 'shape' => 'Definition', ], 'roleArn' => [ 'shape' => 'Arn', ], 'loggingConfiguration' => [ 'shape' => 'LoggingConfiguration', ], 'tracingConfiguration' => [ 'shape' => 'TracingConfiguration', ], ], ], 'UpdateStateMachineOutput' => [ 'type' => 'structure', 'required' => [ 'updateDate', ], 'members' => [ 'updateDate' => [ 'shape' => 'Timestamp', ], ], ], 'includedDetails' => [ 'type' => 'boolean', ], 'truncated' => [ 'type' => 'boolean', ], ],];