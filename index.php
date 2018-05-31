<html>
    <head><title>iTunes Pull</title></head>
    <body><?php
        $mediatype = 'ebook';
        $search = 'Death of superman #2';
        $search = str_replace('-', ' ', $search);
        $search = str_replace('.', ' ', $search);
        $size = "300x300";

        include './classes/itunes.php';
        $results = iTunes::search($search, array(
                    'country' => 'US',
                    'media' => $mediatype
                ))->results;
        $firstresult = $results[0];
        $newresult = json_encode($results, true);
        ?>
        <br><hr><h1>Result Dump Below</h1>

        <hr><H2>Get and resize 18 box arts with titles and descriptions:</H2>
        <?php ?>
        <?php
        for ($i = 0; $i < 18; $i++) {
//$count = $i - 1;
            if (!empty($results[$i])) {
                $result = get_object_vars($results[$i]);
                if (!empty($result)) {
                    $art = $result['artworkUrl100'];
                    if (!empty($result['trackName'])) {
                        echo $result['trackName'] . ' (' . substr($result['releaseDate'], 0, 4) . ')';
                        echo '<br>';
                    } ELSE {
                        echo $result['collectionName'];
                        echo '<br>';
                    }
                    echo '<img src="';
                    echo str_replace('100x100', $size, $art);
                    echo '" alt="';
                    if ($mediatype = 'music') {
                        $album = $result['collectionName'];
                        echo $album;
                    }
                    echo '"></img>';
                    echo '<hr>Description:<br>';
                    if (!empty($result['longDescription'])) {
                        echo $result['longDescription'];
                    } ELSE {
                        echo 'A collection of ';
                        echo $search;
                        echo ' Movies';
                    }
                    echo '<br><br><hr>';
                }
            }
        }
        ?>

        <hr><H2>Dump JSON:</H2>
        <?php var_dump($newresult) ?>

        <hr><H2>Resize Box Art:</H2>
        <img src="<?php
        $vars = get_object_vars($firstresult);
        $art = $vars['artworkUrl100'];
        echo str_replace('100x100', $size, $art);
        ?>"></img>

        <hr><H2>Box Art:</H2>
        <img src="<?php $vars = get_object_vars($firstresult);
        echo $vars['artworkUrl100'];
        ?>"></img>

        <hr><H2>Attempting to pull a single value</H2>
        <hr><?php $vars = get_object_vars($firstresult);
        echo $vars['artistName'];
        ?>

        <br><hr><H2>Attempting to get vars from obj</H2>
<?php $vars = get_object_vars($firstresult);
print_r($vars);
?>

        <hr><h2>First Result</h2>
        <hr><?php var_dump($firstresult); ?>

        <hr><H2>Full Dump</H2>
        <hr><?php var_dump($results); ?>
    </body>
    </<html>
