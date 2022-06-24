<?php


class Form
{

    public function drawForm(
        $amount = 1,
        $header = ["header" =>  "my form", "h" => "h1"],
        $inputs = [
            "amount" => 1,
            "inputData" => ["class" => "", "types" => ["text"], "contents" => ["my input"], "names" => [""]], "divClass" => ""

        ],
        $labelClass = "",
        $buttons = ["class" => "", "amount" => 1, "contents" => ["my button"], "buttonsContainerClass" => ""],
        $method = "POST",
        $formClass = "",
        $formContainerClass = ""
    ) {

        for ($i = 1; $i <= $amount; $i++) : ?>

            <div class="<?= $formContainerClass ?>">
                <?php $this->drawHeader($header) ?>
                <form action="" method="<?= $method ?>" class="<?= $formClass ?>">

                    <?php

                    $this->drawInputs($inputs, $labelClass);
                    $this->drawButtons($buttons);

                    ?>


                </form>
            </div>

        <?php endfor;
    }

    private function drawHeader($header)
    {

        ?>

        <<?= $header["h"] ?> class="<?= $header["class"] ?>"> <?= $header["header"] ?> </<?= $header["h"] ?>>


        <?php
    }

    private function drawInputs($inputs, $labelClass)
    {



        for ($index = 0; $index < $inputs["amount"]; $index++) : ?>

            <div class="<?= $inputs["divClass"]  ?>">
                <label for="<?= $index ?>" class="<?= $labelClass ?>"> <?= $inputs["inputData"]["contents"][$index] ?> </label>
                <input type="<?= $inputs["inputData"]["types"][$index] ?>" class="<?= $inputs["inputData"]["class"] ?>" id="<?= $index ?>" required minlength="1" maxlength="200" name="<?= $inputs["inputData"]["names"][$index] ?>">
                <p class="error"></p>

            </div>

        <?php endfor;
    }

    private function drawButtons($buttons)
    {

        ?>
        <div class="<?= $buttons["buttonsContainerClass"] ?>">

            <?php for ($index = 0; $index < $buttons["amount"]; $index++) : ?>

                <button type="submit" class="<?= $buttons["class"] ?>"> <?= $buttons["contents"][$index] ?> </button>

            <?php endfor; ?>

        </div>

<?php
    }
}
