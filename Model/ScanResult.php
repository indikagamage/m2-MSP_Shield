<?php
/**
 * MageSpecialist
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@magespecialist.it so we can send you a copy immediately.
 *
 * @category   MSP
 * @package    MSP_Shield
 * @copyright  Copyright (c) 2017 Skeeller srl (http://www.magespecialist.it)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace MSP\Shield\Model;

use MSP\Shield\Api\ScanResultInterface;
use MSP\Shield\Api\ThreatInterface;

class ScanResult implements ScanResultInterface
{
    /**
     * @var ThreatInterface[]
     */
    protected $threats;

    protected $score;

    /**
     * ScanResultInterface constructor.
     * @param ThreatInterface[] $threats
     */
    public function __construct(array $threats)
    {
        $this->threats = $threats;
        $this->score = 0;
        foreach ($this->threats as $threat) {
            $this->score += $threat->getScore();
        }
    }

    /**
     * Get score
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Get list of matched threats
     * @return ThreatInterface[]
     */
    public function getThreats()
    {
        return $this->threats;
    }
}