<?php

/**
 * Login tests - the regular way (submitting username & password)
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('auth')]
#[\PHPUnit\Framework\Attributes\Group('login')]
class LoginNormalTest extends AbstractLoginTestCase {

    use LoginAssertionTrait;

}
