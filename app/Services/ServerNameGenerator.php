<?php

namespace App\Services;

use Illuminate\Support\Str;

class ServerNameGenerator
{
    /** @var string[] */
    private array $adjectives = [
        'amber', 'ancient', 'autumn', 'blazing', 'bold', 'brave', 'bright',
        'calm', 'clever', 'coastal', 'cold', 'cool', 'cosmic', 'crimson',
        'dark', 'dawn', 'dazzling', 'deep', 'deft', 'distant', 'divine',
        'eager', 'early', 'electric', 'emerald', 'epic', 'ethereal',
        'fast', 'fierce', 'flaming', 'fleet', 'flying', 'frosty', 'furious',
        'gentle', 'gilded', 'glacial', 'glowing', 'golden', 'grand',
        'happy', 'hidden', 'holy', 'humble',
        'icy', 'infinite', 'inner', 'iron',
        'jade', 'jolly',
        'keen', 'kind',
        'lofty', 'lone', 'lucky', 'lunar', 'lusty',
        'majestic', 'mellow', 'mighty', 'misty', 'mystic',
        'nimble', 'noble',
        'obsidian', 'old', 'onyx',
        'patient', 'peaceful', 'phantom', 'polar', 'proud', 'pure',
        'quick', 'quiet',
        'radiant', 'rapid', 'restless', 'rocky', 'royal', 'rugged',
        'sacred', 'sage', 'serene', 'sharp', 'silent', 'silver', 'sleek',
        'solar', 'steady', 'stern', 'stony', 'stormy', 'strong', 'swift',
        'tall', 'tame', 'tiny', 'tough', 'twilight',
        'valiant', 'vivid',
        'wandering', 'warm', 'wild', 'wise',
        'young',
        'zealous',
    ];

    /** @var string[] */
    private array $animals = [
        'albatross', 'alligator', 'alpaca', 'antelope', 'armadillo',
        'badger', 'bat', 'bear', 'beaver', 'bison', 'boar', 'bobcat', 'buffalo',
        'camel', 'capybara', 'cassowary', 'cat', 'cheetah', 'cobra', 'condor',
        'coyote', 'crane', 'crocodile', 'crow',
        'deer', 'dingo', 'dolphin', 'dove', 'dragon', 'duck',
        'eagle', 'echidna', 'eel', 'elk', 'emu',
        'falcon', 'ferret', 'flamingo', 'fox', 'frog',
        'gecko', 'giraffe', 'gnu', 'goat', 'goose', 'gorilla',
        'hawk', 'hedgehog', 'heron', 'hippo', 'horse', 'hyena',
        'ibis', 'iguana', 'impala',
        'jackal', 'jaguar', 'jellyfish',
        'kangaroo', 'koala', 'komodo',
        'lemur', 'leopard', 'lion', 'lizard', 'llama', 'lobster', 'lynx',
        'magpie', 'manatee', 'marmot', 'meerkat', 'moose', 'moth', 'mule',
        'narwhal', 'newt', 'nighthawk',
        'octopus', 'ostrich', 'otter', 'owl',
        'panda', 'panther', 'parrot', 'pelican', 'penguin', 'phoenix',
        'piranha', 'platypus', 'porcupine', 'puffin', 'python',
        'quail', 'quokka',
        'rabbit', 'raccoon', 'raven', 'rhino',
        'salamander', 'scorpion', 'seal', 'shark', 'sloth', 'snake',
        'sparrow', 'squid', 'stallion', 'starling', 'stingray', 'stork',
        'tapir', 'tiger', 'toad', 'tortoise', 'toucan', 'turtle',
        'viper', 'vulture',
        'walrus', 'weasel', 'whale', 'wildcat', 'wolf', 'wolverine', 'wombat',
        'yak',
        'zebra',
    ];

    public function generate(): string
    {
        $adjective = $this->adjectives[array_rand($this->adjectives)];
        $animal = $this->animals[array_rand($this->animals)];

        return $adjective.'-'.$animal;
    }

    public function toHostname(string $name): string
    {
        return Str::slug($name);
    }
}
