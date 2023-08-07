<?php

/**
 * PPEX_Plugin_Context
 */
if (!class_exists('PPEX_Plugin_Context')) {
  class PPEX_Plugin_Context {
    private $x_source;
    private $x_source_platform;
    private $x_source_platform_version;
    private $x_source_version;
    private $environment;

    function __construct($x_source, $x_source_platform, $x_source_platform_version, $x_source_version, $environment) {
      $this->x_source = $x_source;
      $this->x_source_platform = $x_source_platform;
      $this->x_source_platform_version = $x_source_platform_version;
      $this->x_source_version = $x_source_version;
      if ($environment == 2) {
        $this->environment = PPEX_Constants::STAGE;
      } else if ($environment == 1) {
        $this->environment = PPEX_Constants::PRODUCTION;
      } else {
        $this->environment = PPEX_Constants::UAT;
      }
    }

    function get_x_source() {
      return $this->x_source;
    }

    function get_x_source_platform() {
      return $this->x_source_platform;
    }

    function get_x_source_platform_version() {
      return $this->x_source_platform_version;
    }

    function get_x_source_version() {
      return $this->x_source_version;
    }

    function get_environment() {
      return $this->environment;
    }
  }
}
