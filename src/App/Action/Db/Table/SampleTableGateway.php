<?php
/**
 * Table Definition for record
 *
 * PHP version 5
 *
 * Copyright (C) Villanova University 2010.
 * Copyright (C) University of Freiburg 2014.
 * Copyright (C) The National Library of Finland 2015.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category VuFind
 * @package  Db_Table
 * @author   Markus Beh <markus.beh@ub.uni-freiburg.de>
 * @author   Ere Maijala <ere.maijala@helsinki.fi>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     https://vufind.org Main Site
 */
namespace bibliography_new\src\App\Action\Db\Table;
use Zend\Db\Sql\Predicate\Expression;
use Zend\Db\Sql\Where;
/**
 * Table Definition for record
 *
 * @category VuFind
 * @package  Db_Table
 * @author   Markus Beh <markus.beh@ub.uni-freiburg.de>
 * @author   Ere Maijala <ere.maijala@helsinki.fi>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     https://vufind.org Main Site
 */
class Record extends Gateway
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct('translate_language', 'bibliography_new\src\App\Action\Db\Row\Record');
    }
    
    /**
     * Update an existing entry in the record table or create a new one
     *
     * @param string $id      Record ID
     * @param string $source  Data source
     * @param string $rawData Raw data from source
     *
     * @return Updated or newly added record
     */
    public function updateRecord($id, $de1, $en1, $es1, $fr1, $it1, $nl1)
    {
        $records = $this->select(['record_id' => $id);
        if ($records->count() == 0) {
            $record = $this->createRow();
        } else {
            $record = $records->current();
        }
        //$record->record_id = $id;
        $record->text_de = $de1;
		$record->text_en = $en1;
		$record->text_es = $es1;
		$record->text_fr = $fr1;
		$record->text_it = $it1;
		$record->text_nl = $nl1;
        // Create or update record.
        $record->save();
        return $record;
    }
    
}