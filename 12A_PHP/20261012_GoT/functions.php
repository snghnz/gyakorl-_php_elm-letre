<?php
    function getEpisodeCards($episodes) {
        $result = "<div class='row'>";
        foreach ($episodes as $ep) {
            $result .= "<div class='col-md-3'>";
            $result .= "<div class='card my-2'>";
            $result .= "<div class='card-header fw-bold'>$ep[name]</div>";
            $result .= "<img src='" . $ep["image"]["medium"] . "' class='card-img-top'>";
            $result .= "<div><b>Episode:</b> S$ep[season]/E$ep[number] </div>";
            $result .= "<div><a class='btn btn-primary' href='$ep[url]'>Link</a></div>";
            $result .= "</div>";
            $result .= "</div>";
        }
        $result .= "</div>";
        return $result;
    }

?>
