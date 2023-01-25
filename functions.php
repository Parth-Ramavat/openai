<?php

require_once 'vendor/autoload.php'; 

$api_key = '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';
$client = OpenAI::client($api_key);

if( $_POST['action'] == 'article' ) {

    $result = $client->completions()->create([
        'model' => 'text-davinci-003',
        'prompt' => $_POST['title'],
        'max_tokens' => 1000
    ]);

    if( $result ){
    	echo json_encode( array( 'status' => true,'text' => $result['choices'][0]['text'] ) );
    }
}
else if( $_POST['action'] == 'language' ){

    $text = 'Translate this into '.$_POST['lan_select'].' :'.$_POST['lan_title'];

    $result = $client->completions()->create([
        'model' => 'text-davinci-003',
        'prompt' => $text,
        'max_tokens' => 100
    ]);

    if( $result ){
        echo json_encode( array( 'status' => true,'text' => $result['choices'][0]['text'] ) );
    }

}
else if( $_POST['action'] == 'lan-article' ){

    $text = 'Translate this into English :'.$_POST['lan-title'];

    $change_lang = $client->completions()->create([
        'model' => 'text-davinci-003',
        'prompt' => $text,
        'max_tokens' => 100
    ]);

    $result = $client->completions()->create([
        'model' => 'text-davinci-003',
        'prompt' => $change_lang['choices'][0]['text'],
        'max_tokens' => 100
    ]);

    if( $result ){
        echo json_encode( array( 'status' => true,'text' => $result['choices'][0]['text'] ) );
    }

}
else if( $_POST['action'] == 'grammer-check' ){
    
    $text = 'Correct this to standard English :'.$_POST['gram-title'];

    $result = $client->completions()->create([
        'model' => 'text-davinci-003',
        "prompt"=> $text,
        "temperature"=> 0,
        "max_tokens"=> 60,
        "top_p"=> 1.0,
        "frequency_penalty"=> 0.0,
        "presence_penalty"=> 0.0
    ]);

    if( $result ){
        echo json_encode( array( 'status' => true,'text' => $result['choices'][0]['text'] ) );
    }

}

else if( $_POST['action'] == 'article-summarize' ){

    $result = $client->completions()->create([
        'model' => 'text-davinci-003',
        'prompt' => 'Summarize this for a second-grade student:'.$_POST['content'],
        'max_tokens' => 100
    ]);

    if( $result ){
        echo json_encode( array( 'status' => true,'text' => $result['choices'][0]['text'] ) );
    }

}

?>