# multiplication-bingo

The game of Multiplication Bingo (which is probably not an original idea) is intended as 
an educational reinforcement tool for children, or indeed adults, learning their times tables.

As a player of the game you would have a grid of numbers, with the aim being to cross off numbers
in the usual bingo fashion until all your numbers have been checked. The difference to usual bingo
is that the caller would say, e.g. "6 times 3" or "5 times 7" rather than just "18" or "35", hence
reinforcing knowledge of multiplication tables.

The PHP here creates grids that could be used with this game by picking pairs of random numbers
and multiplying them together. That product is then checked against an array, and if it is not already
in the array it is appended to it. This is to account for instances where several pairs could yield
the same result, e.g. 4x3 and 6x2. Products are not generated initially to avoid creating primes, or 
numbers that are simply too big. Once the array reaches an appropriate size, its contents are presented 
in a grid.

The HTML form collects the parameters to be used for the game, including the range of numbers that 
can be multiplied together, and the size of the grids that are to be generated.
