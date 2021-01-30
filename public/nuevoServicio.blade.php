<select name="ortodoncia_id" id="ortodoncia_id">
                                        <option value=""></option>
                                    @foreach ($ortodoncias as $ortodoncia)
                                        <option value="{{$ortodoncia->id}}">[Cód: {{$ortodoncia->id}}] {{$ortodoncia->nombre}} | ${{$ortodoncia->precio_recomendado}}</option>
                                    @endforeach
                                </select>