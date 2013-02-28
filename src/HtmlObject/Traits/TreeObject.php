<?php
namespace HtmlObject\Traits;

abstract class TreeObject
{
  /**
   * Parent of the object
   * @var TreeObject
   */
  protected $parent;

  /**
   * Children of the object
   * @var array
   */
  protected $children = array();

  ////////////////////////////////////////////////////////////////////
  /////////////////////////////// PARENT /////////////////////////////
  ////////////////////////////////////////////////////////////////////

  /**
   * Get the Element's parent
   *
   * @return Element
   */
  public function getParent()
  {
    return $this->parent;
  }

  /**
   * Set the parent of the element
   *
   * @param Element $parent
   */
  public function setParent(TreeObject $parent)
  {
    $this->parent = $parent;
  }

  ////////////////////////////////////////////////////////////////////
  ////////////////////////////// CHILDREN ////////////////////////////
  ////////////////////////////////////////////////////////////////////

  /**
   * Get a specific child of the element
   *
   * @param string $name The Element's name
   *
   * @return Element
   */
  public function getChild($name)
  {
    return Helpers::arrayGet($this->children, $name);
  }

  /**
   * Add an object to the current object
   *
   * @param mixed $child The child
   * @param strin $name  Its name
   */
  public function setChild($child, $name = null)
  {
    // Bind parent to child
    if ($child instanceof TreeObject) {
      $child->setParent($this);
    }

    if ($name) $this->children[$name] = $child;
    else $this->children[] = $child;
    return $this;
  }
}