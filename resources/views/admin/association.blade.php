@extends('admin.layouts.default')

@section('content')
    <div class="card">
        <div class="card-header card-header-tabs" data-background-color="purple">
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="active">
                            <a href="#infos" data-toggle="tab">
                                <i class="material-icons">edit</i> Mes informations
                                <div class="ripple-container"></div>
                            </a>
                        </li>
                        <li class="">
                            <a href="#equipe" data-toggle="tab">
                                <i class="material-icons">group</i> Mon équipe
                                <div class="ripple-container"></div>
                            </a>
                        </li>
                        <li class="">
                            <a href="#parametres" data-toggle="tab">
                                <i class="material-icons">settings</i> Paramètres
                                <div class="ripple-container"></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-content">
            <div class="tab-content">
                <div class="tab-pane active" id="infos">
                    <form action="{{ route('admin.association.update', $association->id) }}">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail img-circle">
                                        <img src="{{ $association->logo }}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                    <div>
                                                    <span class="btn btn-round btn-primary btn-file">
                                                        <span class="fileinput-new">Ajouter un logo</span>
                                                        <span class="fileinput-exists">Changer</span>
                                                        <input type="file" name="...">
                                                    </span>
                                        <br>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                           data-dismiss="fileinput"><i class="fa fa-times"></i> Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nom</label>
                                    <input type="text" class="form-control" value="{{ $association->nom }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Diminutif</label>
                                    <input name="diminutif" type="text" class="form-control"
                                           value="{{ $association->diminutif }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Email</label>
                                    <input type="email" class="form-control" value="{{ $association->email }}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="btn-group bootstrap-select">
                                    <select id="select-couleur" class="selectpicker" data-style="btn btn-primary btn-round" title="Couleur">
                                        @foreach($couleurs as $couleur)
                                            <option value="{{ $couleur->id }}" style="background-color: {{ $couleur->code }}; color: whitesmoke;"
                                                    @if($couleur->id == $association->couleur->id)
                                                    selected
                                                    @endif
                                            >{{ $couleur->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Lien facebook</label>
                                    <input name="facebook" type="url" class="form-control"
                                           value="{{ $association->lien_facebook }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Lien site web</label>
                                    <input name="siteweb" type="url" class="form-control"
                                           value="{{ $association->lien_siteweb }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Description courte (250 lettres max)</label>
                                        <textarea name="descCourte" class="form-control"
                                                  rows="3">{{ $association->description_courte }}</textarea>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Description longue (2000 lettres max)</label>
                                        <textarea name="descLongue" class="form-control"
                                                  rows="10">{{ $association->description_longue }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Mettre à jour</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="tab-pane" id="equipe">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes" checked=""><span
                                                class="checkbox-material"><span class="check"></span></span>
                                    </label>
                                </div>
                            </td>
                            <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain
                                swept through metro Detroit
                            </td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs"
                                        data-original-title="Edit Task">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs"
                                        data-original-title="Remove">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span
                                                    class="check"></span></span>
                                    </label>
                                </div>
                            </td>
                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs"
                                        data-original-title="Edit Task">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs"
                                        data-original-title="Remove">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="parametres">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span
                                                    class="check"></span></span>
                                    </label>
                                </div>
                            </td>
                            <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs"
                                        data-original-title="Edit Task">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs"
                                        data-original-title="Remove">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes" checked=""><span
                                                class="checkbox-material"><span class="check"></span></span>
                                    </label>
                                </div>
                            </td>
                            <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain
                                swept through metro Detroit
                            </td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs"
                                        data-original-title="Edit Task">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs"
                                        data-original-title="Remove">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span
                                                    class="check"></span></span>
                                    </label>
                                </div>
                            </td>
                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs"
                                        data-original-title="Edit Task">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs"
                                        data-original-title="Remove">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection