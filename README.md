# Advent of Code 2019 solutions

This repository includes my own, personal solutions for [Advent of Code 2019](https://adventofcode.com/2019). Everything coded using PHP due to my nature as a mono-lingual one-trick pony. :D

I started solving these older puzzles together with a few friends during the beginning of 2025.

## Framework

This project is built using the unofficial [Laravel Zero](https://laravel-zero.com/) micro-framework created by [Nuno Maduro](https://github.com/nunomaduro) and [Owen Voke](https://github.com/owenvoke) for building command-line applications.

## Tests

As Advent of Code offers good test cases, I have chosen to do a Test-driven development (TDD) approach to these puzzles, using the [Pest](https://pestphp.com/) testing framework.

In other words, the given test cases from AoC have been rewritten as feature or unit tests as applicable, and the puzzle implementation has been written to satisfy these tests. I am striving for close to 100 % code coverage.
