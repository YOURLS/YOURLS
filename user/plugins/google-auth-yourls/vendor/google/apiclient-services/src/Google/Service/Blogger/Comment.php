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

class Google_Service_Blogger_Comment extends Google_Model
{
  protected $authorType = 'Google_Service_Blogger_CommentAuthor';
  protected $authorDataType = '';
  protected $blogType = 'Google_Service_Blogger_CommentBlog';
  protected $blogDataType = '';
  public $content;
  public $id;
  protected $inReplyToType = 'Google_Service_Blogger_CommentInReplyTo';
  protected $inReplyToDataType = '';
  public $kind;
  protected $postType = 'Google_Service_Blogger_CommentPost';
  protected $postDataType = '';
  public $published;
  public $selfLink;
  public $status;
  public $updated;

  /**
   * @param Google_Service_Blogger_CommentAuthor
   */
  public function setAuthor(Google_Service_Blogger_CommentAuthor $author)
  {
    $this->author = $author;
  }
  /**
   * @return Google_Service_Blogger_CommentAuthor
   */
  public function getAuthor()
  {
    return $this->author;
  }
  /**
   * @param Google_Service_Blogger_CommentBlog
   */
  public function setBlog(Google_Service_Blogger_CommentBlog $blog)
  {
    $this->blog = $blog;
  }
  /**
   * @return Google_Service_Blogger_CommentBlog
   */
  public function getBlog()
  {
    return $this->blog;
  }
  public function setContent($content)
  {
    $this->content = $content;
  }
  public function getContent()
  {
    return $this->content;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_Blogger_CommentInReplyTo
   */
  public function setInReplyTo(Google_Service_Blogger_CommentInReplyTo $inReplyTo)
  {
    $this->inReplyTo = $inReplyTo;
  }
  /**
   * @return Google_Service_Blogger_CommentInReplyTo
   */
  public function getInReplyTo()
  {
    return $this->inReplyTo;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Blogger_CommentPost
   */
  public function setPost(Google_Service_Blogger_CommentPost $post)
  {
    $this->post = $post;
  }
  /**
   * @return Google_Service_Blogger_CommentPost
   */
  public function getPost()
  {
    return $this->post;
  }
  public function setPublished($published)
  {
    $this->published = $published;
  }
  public function getPublished()
  {
    return $this->published;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
}
