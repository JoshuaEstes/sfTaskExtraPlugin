<?php

require_once dirname(__FILE__).'/../sfTaskExtraBaseTask.class.php';

/**
 * Base Subversion task.
 *
 * @package     sfTaskExtraPlugin
 * @subpackage  task
 * @author      Kris Wallsmith <kris.wallsmith@symfony-project.com>
<<<<<<< HEAD
 * @version     SVN: $Id: sfTaskExtraSubversionBaseTask.class.php 24538 2009-11-30 06:25:42Z dwhittle $
=======
 * @version     SVN: $Id: sfTaskExtraSubversionBaseTask.class.php 26597 2010-01-13 23:33:05Z Kris.Wallsmith $
>>>>>>> ba8708782531e237c25c55f198c7eacc5feee572
 */
abstract class sfTaskExtraSubversionBaseTask extends sfTaskExtraBaseTask
{
  protected
    $subversionBinary = 'svn';

  protected function getStatus($path)
  {
<<<<<<< HEAD
    $xml = simplexml_load_string($this->getFilesystem()->execute(sprintf('%s status --xml %s', $this->subversionBinary, escapeshellarg($path))));
=======
    list($out, $err) = $this->getFilesystem()->execute(sprintf('%s status --xml %s', $this->subversionBinary, escapeshellarg($path)));
    $xml = new SimpleXMLElement($out);
>>>>>>> ba8708782531e237c25c55f198c7eacc5feee572
    return (string) $xml->target->entry->{'wc-status'}['item'];
  }

  /**
   * Adds an ignore property.
   *
   * @param string|array $paths
   * @param string       $value
   */
  protected function addIgnore($paths, $value = '*')
  {
    if (!is_array($paths))
    {
      $paths = array($paths);
    }

    foreach ($paths as $path)
    {
      if ('unversioned' == $this->getStatus($path))
      {
        $this->getFilesystem()->execute(sprintf('%s add --parents -N %s', $this->subversionBinary, $path));
      }

      foreach (glob($path.'/'.$value) as $entry)
      {
<<<<<<< HEAD
        if (!in_array($this->getStatus($entry), array('unversioned', 'ignored')))
=======
        $status = $this->getStatus($entry);
        if ($status && !in_array($status, array('unversioned', 'ignored')))
>>>>>>> ba8708782531e237c25c55f198c7eacc5feee572
        {
          $this->getFilesystem()->execute(sprintf('%s rm --force %s', $this->subversionBinary, $entry));
        }
      }

      foreach (glob($path) as $p)
      {
        $this->setSubversionProperty('svn:ignore', $value, $p);
      }
    }
  }

  /**
   * Sets a Subversion property on a path.
   *
   * @param string       $property
   * @param string|array $value
   * @param string|array $path
   */
  protected function setSubversionProperty($property, $value, $path)
  {
    if (!is_array($value))
    {
      $value = array($value);
    }

    if (!is_array($path))
    {
      $path = array($path);
    }

<<<<<<< HEAD
    $file = sys_get_temp_dir().'sf_'.md5(rand(11111, 99999));
    $this->getFilesystem()->touch($file);
    file_put_contents($file, join(PHP_EOL, $value));
=======
    $file = tempnam(sys_get_temp_dir(), 'sf_');
    $this->logSection('file+', $file);
    file_put_contents($file, implode(PHP_EOL, $value));
>>>>>>> ba8708782531e237c25c55f198c7eacc5feee572

    foreach ($path as $p)
    {
      $this->getFilesystem()->execute(vsprintf('%s propset %s -F %s %s', array(
        $this->subversionBinary,
        $property,
        escapeshellarg($file),
        escapeshellarg(!sfToolkit::isPathAbsolute($p) ? sfConfig::get('sf_root_dir').'/'.$p : $p),
      )));
    }

    $this->getFilesystem()->remove($file);
  }

  /**
   * @see sfBaseTask
   */
  protected function process(sfCommandManager $commandManager, $options)
  {
    parent::process($commandManager, $options);

    if (isset($options['with-svn']))
    {
      $this->subversionBinary = $options['with-svn'];
    }
  }
}
