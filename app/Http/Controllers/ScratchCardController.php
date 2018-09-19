<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use App\ScratchCard;

class ScratchCardController extends Controller
{

    public function index()
    {
        $edit = array('editmode'=>'false');
        return view('scratchcard.generate', compact('edit'));


    }
    public function viewAll()
    {
        $sql = "SELECT c.id, c.value, IFNULL(CONCAT(s.firstname,' ', s.lastname), 'Not in use yet') AS student_Name , c.is_active AS status, c.created_at FROM scratch_cards c 
                LEFT OUTER JOIN students s ON (s.id = c.student_id)";
                $cards = DB::select($sql);
        return view('scratchcard.all', compact('cards'));
    }
    public function generate(Request $request)
    {
        $num_of_cards = $request->get('num_of_cards');
        $num_of_cards = 30;
        $i = 0;
        
        while ($i<$num_of_cards)
        {
            $pseudo_code = openssl_random_pseudo_bytes(8);
	        $scratch_card_value = bin2hex($pseudo_code);

            // check if code doesnt already exist
            $find_card = DB::select("SELECT value FROM scratch_cards WHERE value = '".$scratch_card_value."'");
            
            if (!(count($find_card)===1))
            {
                // value hasnt been generated before, 
                // save to DB
                $card = new ScratchCard(array(
                    'value' => $scratch_card_value
                ));
                $card->save();

                // increment $i
                $i++;
            }             
        }
        $generated_cards = DB::select('SELECT value FROM scratch_cards ORDER BY id DESC LIMIT 0, 30');
        $generated_cards = json_decode(json_encode($generated_cards), true);
        $cards = array();
        foreach ($generated_cards as $g_cards)
        {
            $c=0;
            for ($i=0;$i<6;$i++)
            {                        
                for ($t=0;$t<5;$t++)
                {
                    
                        $cards[$i][$t] = $generated_cards[$c];
                        $c++;
                    
                }
            }
        }
        //print_r($cards[0]); echo '<br/>'; print_r($cards[1]); echo '<br/>'; print_r($cards[1][2]['value']); exit();
        $edit = array('editmode'=>'true');
        $cards = json_encode($cards,true);
        return view('scratchcard.generate', compact('edit', 'cards'))->with('status','ScratchCard codes successfully generated');
        
    }

}
