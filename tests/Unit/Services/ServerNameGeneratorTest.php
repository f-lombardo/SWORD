<?php

use App\Services\ServerNameGenerator;

test('ServerNameGenerator generates a hyphenated adjective-animal name', function () {
    $generator = new ServerNameGenerator;

    foreach (range(1, 20) as $i) {
        $name = $generator->generate();
        expect($name)
            ->toMatch('/^[a-z]+-[a-z]+$/')
            ->toContain('-');
    }
});

test('ServerNameGenerator toHostname slugifies names correctly', function () {
    $generator = new ServerNameGenerator;

    expect($generator->toHostname('cool turtle'))->toBe('cool-turtle');
    expect($generator->toHostname('blazing-fox'))->toBe('blazing-fox');
    expect($generator->toHostname('UPPER CASE'))->toBe('upper-case');
    expect($generator->toHostname('multiple  spaces'))->toBe('multiple-spaces');
});

test('ServerNameGenerator hostname matches generate output', function () {
    $generator = new ServerNameGenerator;
    $name = $generator->generate();
    $hostname = $generator->toHostname($name);

    // Since names are already lowercase hyphenated, hostname === name
    expect($hostname)->toBe($name);
});
