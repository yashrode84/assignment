<?php

namespace Drupal\flysystem\Asset;

use Drupal\Core\Asset\CssCollectionOptimizerLazy as DrupalCssCollectionOptimizerLazy;
use Drupal\Core\File\Exception\FileException;

/**
 * Optimizes CSS assets.
 */
class CssCollectionOptimizerLazy extends DrupalCssCollectionOptimizerLazy {

  use SchemeExtensionTrait;

  /**
   * {@inheritdoc}
   */
  public function deleteAll() {
    try {
      $this->fileSystem->deleteRecursive($this->getSchemeForExtension('css') . '://css');
    } catch (FileException $fileException) {
      \Drupal::logger('flysystem')->error($fileException->getMessage());
    }
  }

}
