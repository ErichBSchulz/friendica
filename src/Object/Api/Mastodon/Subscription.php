<?php
/**
 * @copyright Copyright (C) 2010-2021, the Friendica project
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 */

namespace Friendica\Object\Api\Mastodon;

use Friendica\BaseDataTransferObject;

/**
 * Class Subscription
 *
 * @see https://docs.joinmastodon.org/entities/pushsubscription
 */
class Subscription extends BaseDataTransferObject
{
	/** @var string */
	protected $id;
	/** @var string|null (URL)*/
	protected $endpoint;
	/** @var array */
	protected $alerts;
	/** @var string */
	protected $server_key;

	/**
	 * Creates a subscription record from an item record.
	 *
	 * @param array   $subscription
	 * @throws \Friendica\Network\HTTPException\InternalServerErrorException
	 */
	public function __construct(array $subscription, string $vapid)
	{
		$this->id       = (string)$subscription['id'];
		$this->endpoint = $subscription['endpoint'];
		$this->alerts   = [
			'follow'    => $subscription['follow'],
			'favourite' => $subscription['favourite'],
			'reblog'    => $subscription['reblog'],
			'mention'   => $subscription['mention'],
			'mention'   => $subscription['mention'],
			'poll'      => $subscription['poll'],
		];

		$this->server_key = $vapid;
	}
}
