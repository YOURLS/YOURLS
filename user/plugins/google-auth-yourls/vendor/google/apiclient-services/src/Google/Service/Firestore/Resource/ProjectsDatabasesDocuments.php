<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

/**
 * The "documents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firestoreService = new Google_Service_Firestore(...);
 *   $documents = $firestoreService->documents;
 *  </code>
 */
class Google_Service_Firestore_Resource_ProjectsDatabasesDocuments extends Google_Service_Resource
{
  /**
   * Gets multiple documents.
   *
   * Documents returned by this method are not guaranteed to be returned in the
   * same order that they were requested. (documents.batchGet)
   *
   * @param string $database The database name. In the format:
   * `projects/{project_id}/databases/{database_id}`.
   * @param Google_Service_Firestore_BatchGetDocumentsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firestore_BatchGetDocumentsResponse
   */
  public function batchGet($database, Google_Service_Firestore_BatchGetDocumentsRequest $postBody, $optParams = array())
  {
    $params = array('database' => $database, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', array($params), "Google_Service_Firestore_BatchGetDocumentsResponse");
  }
  /**
   * Starts a new transaction. (documents.beginTransaction)
   *
   * @param string $database The database name. In the format:
   * `projects/{project_id}/databases/{database_id}`.
   * @param Google_Service_Firestore_BeginTransactionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firestore_BeginTransactionResponse
   */
  public function beginTransaction($database, Google_Service_Firestore_BeginTransactionRequest $postBody, $optParams = array())
  {
    $params = array('database' => $database, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('beginTransaction', array($params), "Google_Service_Firestore_BeginTransactionResponse");
  }
  /**
   * Commits a transaction, while optionally updating documents.
   * (documents.commit)
   *
   * @param string $database The database name. In the format:
   * `projects/{project_id}/databases/{database_id}`.
   * @param Google_Service_Firestore_CommitRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firestore_CommitResponse
   */
  public function commit($database, Google_Service_Firestore_CommitRequest $postBody, $optParams = array())
  {
    $params = array('database' => $database, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('commit', array($params), "Google_Service_Firestore_CommitResponse");
  }
  /**
   * Creates a new document. (documents.createDocument)
   *
   * @param string $parent The parent resource. For example:
   * `projects/{project_id}/databases/{database_id}/documents` or `projects/{proje
   * ct_id}/databases/{database_id}/documents/chatrooms/{chatroom_id}`
   * @param string $collectionId The collection ID, relative to `parent`, to list.
   * For example: `chatrooms`.
   * @param Google_Service_Firestore_Document $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string documentId The client-assigned document ID to use for this
   * document.
   *
   * Optional. If not specified, an ID will be assigned by the service.
   * @opt_param string mask.fieldPaths The list of field paths in the mask. See
   * Document.fields for a field path syntax reference.
   * @return Google_Service_Firestore_Document
   */
  public function createDocument($parent, $collectionId, Google_Service_Firestore_Document $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'collectionId' => $collectionId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('createDocument', array($params), "Google_Service_Firestore_Document");
  }
  /**
   * Deletes a document. (documents.delete)
   *
   * @param string $name The resource name of the Document to delete. In the
   * format:
   * `projects/{project_id}/databases/{database_id}/documents/{document_path}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool currentDocument.exists When set to `true`, the target
   * document must exist. When set to `false`, the target document must not exist.
   * @opt_param string currentDocument.updateTime When set, the target document
   * must exist and have been last updated at that time.
   * @return Google_Service_Firestore_FirestoreEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Firestore_FirestoreEmpty");
  }
  /**
   * Gets a single document. (documents.get)
   *
   * @param string $name The resource name of the Document to get. In the format:
   * `projects/{project_id}/databases/{database_id}/documents/{document_path}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string mask.fieldPaths The list of field paths in the mask. See
   * Document.fields for a field path syntax reference.
   * @opt_param string readTime Reads the version of the document at the given
   * time. This may not be older than 60 seconds.
   * @opt_param string transaction Reads the document in a transaction.
   * @return Google_Service_Firestore_Document
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Firestore_Document");
  }
  /**
   * Lists documents. (documents.listProjectsDatabasesDocuments)
   *
   * @param string $parent The parent resource name. In the format:
   * `projects/{project_id}/databases/{database_id}/documents` or
   * `projects/{project_id}/databases/{database_id}/documents/{document_path}`.
   * For example: `projects/my-project/databases/my-database/documents` or
   * `projects/my-project/databases/my-database/documents/chatrooms/my-chatroom`
   * @param string $collectionId The collection ID, relative to `parent`, to list.
   * For example: `chatrooms` or `messages`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of documents to return.
   * @opt_param string transaction Reads documents in a transaction.
   * @opt_param string readTime Reads documents as they were at the given time.
   * This may not be older than 60 seconds.
   * @opt_param string orderBy The order to sort results by. For example:
   * `priority desc, name`.
   * @opt_param bool showMissing If the list should show missing documents. A
   * missing document is a document that does not exist but has sub-documents.
   * These documents will be returned with a key but will not have fields,
   * Document.create_time, or Document.update_time set.
   *
   * Requests with `show_missing` may not specify `where` or `order_by`.
   * @opt_param string mask.fieldPaths The list of field paths in the mask. See
   * Document.fields for a field path syntax reference.
   * @opt_param string pageToken The `next_page_token` value returned from a
   * previous List request, if any.
   * @return Google_Service_Firestore_ListDocumentsResponse
   */
  public function listProjectsDatabasesDocuments($parent, $collectionId, $optParams = array())
  {
    $params = array('parent' => $parent, 'collectionId' => $collectionId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Firestore_ListDocumentsResponse");
  }
  /**
   * Lists all the collection IDs underneath a document.
   * (documents.listCollectionIds)
   *
   * @param string $parent The parent document. In the format:
   * `projects/{project_id}/databases/{database_id}/documents/{document_path}`.
   * For example: `projects/my-project/databases/my-database/documents/chatrooms
   * /my-chatroom`
   * @param Google_Service_Firestore_ListCollectionIdsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firestore_ListCollectionIdsResponse
   */
  public function listCollectionIds($parent, Google_Service_Firestore_ListCollectionIdsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('listCollectionIds', array($params), "Google_Service_Firestore_ListCollectionIdsResponse");
  }
  /**
   * Listens to changes. (documents.listen)
   *
   * @param string $database The database name. In the format:
   * `projects/{project_id}/databases/{database_id}`.
   * @param Google_Service_Firestore_ListenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firestore_ListenResponse
   */
  public function listen($database, Google_Service_Firestore_ListenRequest $postBody, $optParams = array())
  {
    $params = array('database' => $database, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('listen', array($params), "Google_Service_Firestore_ListenResponse");
  }
  /**
   * Updates or inserts a document. (documents.patch)
   *
   * @param string $name The resource name of the document, for example
   * `projects/{project_id}/databases/{database_id}/documents/{document_path}`.
   * @param Google_Service_Firestore_Document $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool currentDocument.exists When set to `true`, the target
   * document must exist. When set to `false`, the target document must not exist.
   * @opt_param string updateMask.fieldPaths The list of field paths in the mask.
   * See Document.fields for a field path syntax reference.
   * @opt_param string mask.fieldPaths The list of field paths in the mask. See
   * Document.fields for a field path syntax reference.
   * @opt_param string currentDocument.updateTime When set, the target document
   * must exist and have been last updated at that time.
   * @return Google_Service_Firestore_Document
   */
  public function patch($name, Google_Service_Firestore_Document $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Firestore_Document");
  }
  /**
   * Rolls back a transaction. (documents.rollback)
   *
   * @param string $database The database name. In the format:
   * `projects/{project_id}/databases/{database_id}`.
   * @param Google_Service_Firestore_RollbackRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firestore_FirestoreEmpty
   */
  public function rollback($database, Google_Service_Firestore_RollbackRequest $postBody, $optParams = array())
  {
    $params = array('database' => $database, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('rollback', array($params), "Google_Service_Firestore_FirestoreEmpty");
  }
  /**
   * Runs a query. (documents.runQuery)
   *
   * @param string $parent The parent resource name. In the format:
   * `projects/{project_id}/databases/{database_id}/documents` or
   * `projects/{project_id}/databases/{database_id}/documents/{document_path}`.
   * For example: `projects/my-project/databases/my-database/documents` or
   * `projects/my-project/databases/my-database/documents/chatrooms/my-chatroom`
   * @param Google_Service_Firestore_RunQueryRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firestore_RunQueryResponse
   */
  public function runQuery($parent, Google_Service_Firestore_RunQueryRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('runQuery', array($params), "Google_Service_Firestore_RunQueryResponse");
  }
  /**
   * Streams batches of document updates and deletes, in order. (documents.write)
   *
   * @param string $database The database name. In the format:
   * `projects/{project_id}/databases/{database_id}`. This is only required in the
   * first message.
   * @param Google_Service_Firestore_WriteRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firestore_WriteResponse
   */
  public function write($database, Google_Service_Firestore_WriteRequest $postBody, $optParams = array())
  {
    $params = array('database' => $database, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('write', array($params), "Google_Service_Firestore_WriteResponse");
  }
}
