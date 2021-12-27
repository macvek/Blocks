<?php

class BlocksController implements Controller {
    public function controller() {
        return ["Model of blocks", new BlocksView()];
    }
}