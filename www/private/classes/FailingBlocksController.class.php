<?php

class FailingBlocksController implements Controller {
    public function controller() {
        return ["I'm not returning","Instance of View"];
    }
}