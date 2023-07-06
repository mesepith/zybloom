<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v13/common/audiences.proto

namespace Google\Ads\GoogleAds\V13\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Dimension specifying users by their age.
 *
 * Generated from protobuf message <code>google.ads.googleads.v13.common.AgeDimension</code>
 */
class AgeDimension extends \Google\Protobuf\Internal\Message
{
    /**
     * Contiguous age range to be included in the dimension.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v13.common.AgeSegment age_ranges = 1;</code>
     */
    private $age_ranges;
    /**
     * Include users whose age is not determined.
     *
     * Generated from protobuf field <code>optional bool include_undetermined = 2;</code>
     */
    protected $include_undetermined = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V13\Common\AgeSegment>|\Google\Protobuf\Internal\RepeatedField $age_ranges
     *           Contiguous age range to be included in the dimension.
     *     @type bool $include_undetermined
     *           Include users whose age is not determined.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V13\Common\Audiences::initOnce();
        parent::__construct($data);
    }

    /**
     * Contiguous age range to be included in the dimension.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v13.common.AgeSegment age_ranges = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAgeRanges()
    {
        return $this->age_ranges;
    }

    /**
     * Contiguous age range to be included in the dimension.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v13.common.AgeSegment age_ranges = 1;</code>
     * @param array<\Google\Ads\GoogleAds\V13\Common\AgeSegment>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAgeRanges($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V13\Common\AgeSegment::class);
        $this->age_ranges = $arr;

        return $this;
    }

    /**
     * Include users whose age is not determined.
     *
     * Generated from protobuf field <code>optional bool include_undetermined = 2;</code>
     * @return bool
     */
    public function getIncludeUndetermined()
    {
        return isset($this->include_undetermined) ? $this->include_undetermined : false;
    }

    public function hasIncludeUndetermined()
    {
        return isset($this->include_undetermined);
    }

    public function clearIncludeUndetermined()
    {
        unset($this->include_undetermined);
    }

    /**
     * Include users whose age is not determined.
     *
     * Generated from protobuf field <code>optional bool include_undetermined = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setIncludeUndetermined($var)
    {
        GPBUtil::checkBool($var);
        $this->include_undetermined = $var;

        return $this;
    }

}

