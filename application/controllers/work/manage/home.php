<?php
/*
* PinaCMS
* 
* THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
* "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
* LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
* A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
* OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
* SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
* LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
* DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
* THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
* (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
* OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*
* @copyright � 2010 Dobrosite ltd.
*/

if (!defined('PATH')){ exit; }


require_once PATH_TABLES .'work_group.php';

$workGroupGateway = new WorkGroupGateway();
$groups = $workGroupGateway->findAll();
if($groups)
{
	
	$group_value=$groups[0]['work_group_id'];
	foreach($groups as $group)
	{
		$group_statuses[] = array(
		    "value" =>$group['work_group_id'], 
		    "caption" =>$group['work_group_title'], 
		    "color" => "orange" 
		);
	}
	
	$group_statuses[] = array(
		    "value" => "*", 
		    "caption" => lng("filter_all"),
		    "color" => "orange"
	);

	$request->result("group_statuses", $group_statuses);
	$request->result("group_value", '*');
}



$request->addLocation(lng("portfolio"), href(array("action" => "work.manage.home")));

$request->setLayout('admin');
$request->ok();