# Nukular

## Philosophy

* Core functionality should be simple and easy to use
* Setter methods should return the object instance to allow for method chaining
* Methods should be immutable and return a new instance of the object if not stated otherwise
  * For example `->reversed()` returns the reversed instance of [NuString](/docs/classes/Nukular-NuString.html) and `->reverse()` reverses the data in the NuString instance
* High test coverage to ensure stability and reliability
* No dependencies
* No external libraries
* No external services

## Installation

```bash
composer require maluramichael/nukular
```

## Usage

See the [documentation](/docs/index.html) for a detailed class structure and usage.
